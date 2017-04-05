<?php
namespace App\MediaWiki;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class MediaWiki {

	public static function savePageInMediaWiki($pageTitle, $pageContent, $projectId)
	{
		//save page in MediaWiki
		$url = config('app.mediawiki_url').'?action=edit';
		$params = '&format=json';
		$params .= '&title=' . $projectId.'_!_'.$pageTitle;
		$params .= '&sectiontitle= ';
		$params .= '&section=new';
		$params .= '&summary=' . Auth::user()->name;
		$params .= '&text=' . $pageContent;
		//need to change token
		$params .= '&token=+\\';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		if($result){
			$parsedResult = json_decode($result, true);
			if(isset($parsedResult['edit']['result']) && $parsedResult['edit']['result'] == 'Success'){
				return self::prepareTitle($parsedResult['edit']['title'], $projectId);
			}
		}
		return false;
	}


	public static function updatePageInMediaWiki($pageTitle, $pageContent, $projectId){
		$url = config('app.mediawiki_url').'?action=edit';
		$params = '&format=json';
		$params .= '&summary=' . Auth::user()->name;
		$params .= '&title=' . $projectId.'_!_'.$pageTitle;
		$params .= '&text=' . $pageContent;
		$params .= '&token=+\\';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		if($result){
			$parsedResult = json_decode($result, true);
			if(isset($parsedResult['edit']['result']) && $parsedResult['edit']['result'] == 'Success'){
				return self::prepareTitle($parsedResult['edit']['title'], $projectId);
			}
		}
		return false;
	}

	public static function deletePageFromMediaWiki($pageTitle, $projectId){
		$url = config('app.mediawiki_url').'?action=delete';
		$params = '&format=json';
		$params .= '&title=' . $projectId.'_!_'.str_replace(' ', '_', $pageTitle);
		$params .= '&token=' . urlencode('+\\');
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($ch);
		curl_close($ch);
		return true;
	}

	public static function getHistory($pageTitle, $project){
		//prepare url for request
		$url = config('app.mediawiki_url');
		$params = '?action=query';
		$params .= '&prop=revisions';
		$params .= '&rvprop=content|timestamp|ids|user|comment';
		$params .= '&rvlimit=max';
		$params .= '&titles=' . $project.'_!_'.str_replace(' ', '_', $pageTitle);
		$params .= '&format=json';
		//send request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url . $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);

		curl_close($ch);
		$revisions = json_decode($result, true);

		if (isset($revisions['query']['pages']))
		{
			foreach ($revisions['query']['pages'] as $wikiPageInfo)
			{
				$param['revisions'] = [];
				$param['title'] = self::prepareTitle($wikiPageInfo['title'], $project);
				if (!isset($wikiPageInfo['revisions']))
				{
					return false;
				}
				foreach ($wikiPageInfo['revisions'] as $revision)
				{
					$revision['timestamp'] = str_replace(['T', 'Z'], [' ', ' '], $revision['timestamp']);
					$revision['user'] = $revision['comment'];
					$revision['*'] = trim(self::parse($revision['*']));
					$param['revisions'][] = $revision;
				}
			}
			return $param;
		}
		return false;
	}

	public static function rollbackMediaWikiPage($title, $parentId, $revId, $projectId){

			$url = config('app.mediawiki_url').'?action=edit';
			$params = '&format=json';
			$params .= '&title=' . $projectId.'_!_'.str_replace(' ', '_', $title);;
			$params .= '&sectiontitle= ';
			$params .= '&undoafter=' . $parentId;
			$params .= '&undo=' . $revId;
			$params .= '&summary=' . Auth::user()->name;
			//need to change token
			$params .= '&token=+\\';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_exec($ch);
			curl_close($ch);


			//prepare url for request
			$url = config('app.mediawiki_url');
			$params = '?action=query';
			$params .= '&prop=revisions';
			$params .= '&rvprop=content';
			$params .= '&rvlimit=1';
			$params .= '&titles=' . $projectId.'_!_'.str_replace(' ', '_', $title);
			$params .= '&format=json';
			//send request
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url . $params);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($ch);

			curl_close($ch);
			$revisions = json_decode($result, true);

		return $revisions;
	}

	public static function prepareTitle($title, $projectId){
		$title = str_replace(' ', '_', $title);
		preg_match('#'.$projectId.'_!_(.+)#ims', $title, $preparedTitle);
		return trim($preparedTitle[1]);
	}

	public static function parse($text)
	{
		$content = $text;
		//Get all the relations.
		preg_match_all("/\[\[(.*?)\]\]/", $content, $matched_relations);
		//Pull them out so that Parsedown doesn't try to parse them.
		$content = preg_replace("/\[\[(.*?)\]\]/", "", $content);
		//Parse the content
		$parser = new \Parsedown();
		$content = str_replace('==   ==', '', $content);
		return $parser->text($content);
	}

}