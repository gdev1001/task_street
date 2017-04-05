<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\Command\ParseCommand;
use App\project;
use App\task;

use Illuminate\Support\Facades\Input;

class Page extends Model
{
	/*
	 * Pages are related to other Pages. Categories are a form of page.
	 */
  public function parents() {
		return $this->belongsToMany(Page::class, 'page_pivot', 'child_id', 'parent_id');
	}

	public function children() {
		return $this->belongsToMany(Page::class, 'page_pivot', 'parent_id', 'child_id');
	}

	public function project(){
		return $this->belongsToMany('App\project');
	}

	public function task(){
		return $this->belongsToMany('App\task');
	}


	public function parse() {
		if(!is_null($this->raw)) {
			$content = $this->raw;
			//Get all the relations.
			preg_match_all("/\[\[(.*?)\]\]/", $content, $matched_relations);
			//Pull them out so that Parsedown doesn't try to parse them.
			$content = preg_replace("/\[\[(.*?)\]\]/", "", $content);
			//Parse the content
			$parser = new \Parsedown();
			$this->parsed = $parser->text($content);
			$this->save();

			$sync = [];
			foreach($matched_relations[1] as $relation) {
				if(!is_null($page = Page::whereTitle($relation)->first())) {
					$sync[] = $page->id;
				}
			}

			foreach($this->parents()->get() as $item){
				$sync[] = $item->id;
			}
			$this->parents()->sync($sync);
		}
	}

	public static function orphaned() {

		$pages = \App\Page::all();
		$finalpages = [];
		foreach($pages as $page) {
			if($page->parents()->count() == 0) {
				$finalpages[] = $page;
			}
		}
		return $finalpages;
	}




}
