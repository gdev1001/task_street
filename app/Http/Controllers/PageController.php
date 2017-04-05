<?php

namespace App\Http\Controllers;

use App\Page;
use App\task;
use App\project;
use Gitlab\Model\User;
use Illuminate\Http\Request;


use DomDocument;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Shokse\Notice\Facades\Notice;
use App\UserPivot;
use Auth;
use App\PageLockPivot;
use DB;

use Illuminate\Support\Facades\Config;
use App\Services\BraintreeGateway;

class PageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
//        $this->middleware('wiki');
        $this->middleware('auth');
    }


    public function index(Request $request,$name)
    {
		$parm = $this->getPages($name);
        $parm['isCompany'] = (Auth::user()->isCompany == 1) ? true : false;
        if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1)
        {
            $parm['can_create_page'] = 1;
        }
        if($request->ajax()){
            $parm['popup']=1;
        }

        return view('wiki.wiki')->with($parm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name, $id)
    {
        if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1)
        {
            $parm = $this->getPages($name);

            $page = Page::find($id);
            $parm['page'] = $page;            
            $users = DB::select('SELECT users.name, users.email, pivot.*  FROM users AS users INNER JOIN user_pivot AS pivot
								ON (pivot.user_id = users.id) WHERE pivot.page_id = ?', array($id));
            $parm['users'] = [];
            $parm['can_create_page'] = 1;
            return view('wiki.create')->with($parm);
        } else
        {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $name)
    {
        //save page in MediaWiki
        $url = config('app.mediawiki_url').'?action=edit';
        $params = '&format=json';
        $params .= '&title=' . $request->input('title');
        $params .= '&sectiontitle= ';
        $params .= '&section=new';
        $params .= '&summary=' . Auth::user()->name;
        $params .= '&text=' . $request->input('raw');
        //need to change token
        $params .= '&token=+\\';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result)
        {
            $result = json_decode($result);
            $page = new Page();
            $page->title = $result->edit->title;
            $page->raw = $request->input('raw');
            $page->parse();
            $page->save();

            //save permissions for owner
            $userPivot = new UserPivot();
            $userPivot->page_id = $page->id;
            $userPivot->user_id = Auth::user()->id;
            $userPivot->is_owner = 1;
            $userPivot->save();

            \Flash::success('Page created.');


            if ($name[0] == "1")
            {
                $task = task::find($name);
                $task->pages()->attach($page->id);
            }

            if ($name[0] == "2")
            {
                $project = Project::find($name);
                $project->pages()->attach($page->id);
            }

            return redirect()->to($name . '/wiki/' . $page->id);
        }
        //can't create page in mediawiki
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$name, $id)
    {

        $userPivot = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first(); 
        
    	if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1 || ($userPivot !== null && ($userPivot->is_owner ==1 || $userPivot->is_editor ==1 || $userPivot->is_viewer ==1)))
        {
            $parm = $this->getPages($name);
            
            $page = Page::find($id);
            $parm['page'] = $page;
            $param['name'] = $name;
            $parm = array_merge($parm, $this->preparePermissions($userPivot));
            $users = DB::select('SELECT users.name, users.email, pivot.*  FROM users AS users INNER JOIN user_pivot AS pivot
								ON (pivot.user_id = users.id) WHERE pivot.page_id = ?', array($id));
            $parm['users'] = $users;
            if($request->ajax()){
                $parm['popup']=1;
            }
			// to set ischeck flag if user visit to details page
			$page->isCheck = 1;
			$page->save();
			
            $parm['isCompany'] = (Auth::user()->isCompany == 1) ? true : false;
            return view('wiki.show')->with($parm);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name, $id)
    {
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        $page = Page::findOrFail($id);
        if ($page->lock ==0 && ($user !== null && ($user->is_owner ==1 || $user->is_editor ==1)) || Auth::user()->isCompany == 1 || Auth::user()->isExpertise == 1)
        {
            $parm = $this->getPages($name);
            $parm['page'] = $page;
            $users = DB::select('SELECT users.name, users.email, pivot.*  FROM users AS users INNER JOIN user_pivot AS pivot
								ON (pivot.user_id = users.id) WHERE pivot.page_id = ?', array($id));
            $parm['users'] = $users;

            $parm = array_merge($parm, $this->preparePermissions($user));
            return view('wiki.edit')->with($parm);
        } else
        {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name, $id)
    {
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        $page = \App\Page::findOrFail($id);
        if ($page->lock ==0 && ($user !== null && $user->is_owner ==1 || $user->is_editor ==1) || Auth::user()->isCompany == 1 || Auth::user()->isExpertise == 1)
        {


            $this->validate($request, [
                'title' => 'required|max:255|unique:pages,title,' . $page->title . ',title',
                'raw' => 'required',
            ]);

            $message = $request->get('raw');
            $dom = new DomDocument();
            $dom->loadHtml(mb_convert_encoding($message, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');

            // foreach <img> in the submited message
            foreach ($images as $img)
            {
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if (preg_match('/data:image/', $src))
                {

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = "/img/$filename.$mimetype";

                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)// encode file to the specified mimetype
                        ->save(public_path($filepath));

                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!--endforeach


            $page->raw = $dom->saveHTML();


            $page->title = $request->input('title');

            if ($name[0] == "1")
            {
                $task = task::find($name);
                //dd($task->student);
            }

            if ($name[0] == "2")
            {
                $project = Project::find($name);
                $ids = collect($project->company); // Sample return from query to get recipients
                $data = [
                    'receiver_ids' => $ids,
                    'content' => [
                        'type' => 'project',
                        'id' => $project->id,
                        'title' => 'Wiki ' . $project->name
                    ]
                ];

                // Trigger a listener
                Notice::doc('Project')->edited($data);
            }

            //$ids = collect([$name]); // Sample return from query to get recipients


            $page->parse();

            //save in MediaWiki
            $url = config('app.mediawiki_url').'?action=edit';
            $params = '&format=json';
            $params .= '&summary=' . Auth::user()->name;
            $params .= '&title=' . $request->input('title');
            $params .= '&text=' . $dom->saveHTML();
            $params .= '&token=+\\';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            if (!$result)
            {
                return redirect()->back();
            }
            //save in db
			$page->isCheck =0;
            $page->save();
			
            \Flash::success('Page edited.');
            return redirect()->to($name . '/wiki/' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name, $id)
    {
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if (($user !== null && $user->is_owner ==1) || Auth::user()->isCompany == 1)
        {
            $page = Page::findOrFail($id);
            $page->delete();
            //delete data prom pivot table
            PageLockPivot::where('page_id', '=', $id)->delete();

            $url = config('app.mediawiki_url').'?action=delete';
            $params = '&format=json';
            $params .= '&title=' . str_replace(' ', '_', $page->title);
            $params .= '&token=' . urlencode('+\\');
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($ch);
            curl_close($ch);


            \Flash::success('Page deleted.');
            return redirect()->to($name . '/wiki');
        }
        return back();
    }

    public function refresh($name, $id)
    {
        $page = Page::findOrFail($id);
        $page->parse();
        $page->save();
        \Flash::success('Page refreshed. The latest HTML has been rebuilt.');
        return redirect()->to($name . '/wiki/' . $id);
    }

    public function showHistory($name, $id)
    {
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if (($user !== null && ($user->is_owner ==1 || $user->is_editor ==1)) || Auth::user()->isCompany == 1)
        {
            $page = Page::findOrFail($id);
            //prepare url for request
            $url = config('app.mediawiki_url');
            $params = '?action=query';
            $params .= '&prop=revisions';
            $params .= '&rvprop=content|timestamp|ids|user|comment';
            $params .= '&rvlimit=max';
            $params .= '&titles=' . str_replace(' ', '_', $page->title);
            $params .= '&format=json';
            //send request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url . $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);

            curl_close($ch);
            $revisions = json_decode($result, true);

            $param = $this->getPages($name);
            if (isset($revisions['query']['pages']))
            {
                foreach ($revisions['query']['pages'] as $wikiPageInfo)
                {
                    $param['revisions'] = [];
                    $param['title'] = $wikiPageInfo['title'];
                    if (!isset($wikiPageInfo['revisions']))
                    {
                        return redirect()->back();
                    }
                    foreach ($wikiPageInfo['revisions'] as $revision)
                    {
                        $revision['timestamp'] = str_replace(['T', 'Z'], [' ', ' '], $revision['timestamp']);
                        $revision['user'] = $revision['comment'];
                        $revision['*'] = $this->parse($revision['*']);
                        $param['revisions'][] = $revision;
                    }
                }
            }
            $param['page'] = $page;
            $param = array_merge($param, $this->preparePermissions($user));
            return view('wiki.history')->with($param);
        } else
        {
            abort(404);
        }
    }

    public function rollback($name, $id, $parentId, $revId)
    {
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if (($user !== null && $user->is_owner ==1 || $user->is_editor ==1) || Auth::user()->isCompany == 1)
        {
            //save page in MediaWiki
            $page = Page::findOrFail($id);


            $url = config('app.mediawiki_url').'?action=edit';
            $params = '&format=json';
            $params .= '&title=' . str_replace(' ', '_', $page->title);;
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
            $params .= '&titles=' . str_replace(' ', '_', $page->title);
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
                    if (!isset($wikiPageInfo['revisions']))
                    {
                        return redirect()->back();
                    }
                    foreach ($wikiPageInfo['revisions'] as $revision)
                    {
                        $page->raw = $revision['*'];
                        $page->parse();
                        $page->save();
                    }
                }
            }
            return back();
        } else
        {
            abort(404);
        }

    }

    //parse raw text to html
    private function parse($text)
    {
        $content = $text;
        //Get all the relations.
        preg_match_all("/\[\[(.*?)\]\]/", $content, $matched_relations);
        //Pull them out so that Parsedown doesn't try to parse them.
        $content = preg_replace("/\[\[(.*?)\]\]/", "", $content);
        //Parse the content
        $parser = new \Parsedown();

        return $parser->text($content);
    }

    /**
     * Send notification with request about lock/unlock
     * @param Request $request
     * @param $name
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendNotification(Request $request, $name, $id)
    {
        if ($request->has('action'))
        {
            $request->get('action') =='unlock' ? $action = 0 : $action = 1;
        } else
        {
            return 'Request is wrong!';
        }
        //all owners
        $usersPivot = UserPivot::where('page_id', '=', $id)->where('is_owner', '=', 1)->get(array('user_id'))->toArray();

        if (count($usersPivot) ==1)
        {
            $page = Page::find($id);
            if ($page !== null)
            {
                $page->lock = $action;
                $page->save();
            }
        } else
        {
            //need know if user is owner.
            $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
            if ($user !== null && $user->is_owner ==1)
            {
                //save data in pivot table
                $pageLockPivot = new PageLockPivot();
                $pageLockPivot->user_id = Auth::user()->id;
                $pageLockPivot->page_id = $id;
                $pageLockPivot->lock = $action;
                $pageLockPivot->save();

                //prepare notification
                $ids = [];
                foreach ($usersPivot as $item)
                {
                    $ids[] = $item['user_id'];
                }

                $page = Page::find($id);
                if ($page !== null)
                {

                    $data = [
                        'receiver_ids' => $ids,
                        'content' => [
                            'type' => 'project',
                            'id' => $id,
                            'title' => '$page->title',
                            'name' => $name
                        ]
                    ];

                    // // Trigger a listener
                    Notice::doc('Project')->lockUnlock($data);
                }

            } else
            {
                abort(404);
            }
        }
        return back();
    }


    /**
     * Lock the page
     * @param $id
     * @return bool
     */
    public function pageLock($name, $id)
    {

        //need know if user is owner.
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if ($user !== null && $user->is_owner ==1)
        {
            //save data in pivot table
            $pageLockPivot = new PageLockPivot();
            $pageLockPivot->user_id = Auth::user()->id;
            $pageLockPivot->page_id = $id;
            $pageLockPivot->lock = 1;
            $pageLockPivot->save();

            $approvedLock = PageLockPivot::where('page_id', '=', $id)->where('lock', '=', 1)->get();
            //all owners
            $userPivot = UserPivot::where('page_id', '=', $id)->where('is_owner', '=', 1)->get(array('user_id'))->toArray();
            $page = Page::find($id);
            if ($page !== null)
            {
                if (count($approvedLock) ==count($userPivot))
                {
                    //lock page
                    $page->lock = 1;
                    $page->save();
                    //clean page_lock_pivot table
                    PageLockPivot::where('page_id', '=', $id)->where('lock', '=', 1)->delete();
                }
            }
            return back();
        }

    }

    /**
     * Unlock the page
     * @param $id
     * @return bool
     */
    public function pageUnlock($name, $id)
    {
        //need know if user is owner.
        $user = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if ($user !== null && $user->is_owner ==1)
        {
            //save data in pivot table
            $pageLockPivot = new PageLockPivot();
            $pageLockPivot->user_id = Auth::user()->id;
            $pageLockPivot->page_id = $id;
            $pageLockPivot->lock = 0;
            $pageLockPivot->save();

            $approvedLock = PageLockPivot::where('page_id', '=', $id)->where('lock', '=', 1)->get();
            //all owners
            $userPivot = UserPivot::where('page_id', '=', $id)->where('is_owner', '=', 1)->get(array('user_id'))->toArray();
            $page = Page::find($id);
            if ($page !== null)
            {
                if (count($approvedLock) ==count($userPivot))
                {
                    //unlock page
                    $page->lock = 0;
                    $page->save();
                    //clean page_lock_pivot table
                    PageLockPivot::where('page_id', '=', $id)->where('lock', '=', 1)->delete();
                }
            }
            return back();
        }
    }


    public function managePermissions(Request $request, $name, $id)
    {
        $pivot = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first();
        if (($pivot !== null && $pivot->is_owner ==1) || Auth::user()->isCompany == 1)
        {
            $page = Page::findOrFail($id);

            $users = DB::select('SELECT users.name, pivot.*  FROM users AS users INNER JOIN user_pivot AS pivot
								ON (pivot.user_id = users.id) WHERE pivot.page_id = ?', array($id));
            $data = $this->getPages($name);

            $data['title'] = $page->title;
            $data['page'] = $page;
            $data['users'] = $users;
            $data = array_merge($data, $this->preparePermissions($pivot));

            if ($request->has('username'))
            {
                $user = \App\User::where('name', '=', trim($request->get('username')))->first();
                if (!$user)
                {
                    $data['message'] = 'Can\'t find this user';
                    return view('wiki.manage-permissions')->with($data);
                }

                $userPivot = UserPivot::where('user_id', '=', $user->id)->where('page_id', '=', $id)->first();
                if ($userPivot ==null)
                {
                    //create new object
                    $userPivot = new UserPivot();
                }
                //default value
                $userPivot->user_id = $user->id;
                $userPivot->page_id = $id;
                $userPivot->is_owner = 0;
                $userPivot->is_editor = 0;
                $userPivot->is_viewer = 0;
                //add permission
                if ($request->has('owner'))
                {
                    $userPivot->is_owner = 1;
                } elseif ($request->has('editor'))
                {
                    $userPivot->is_editor = 1;
                } elseif ($request->has('viewer'))
                {
                    $userPivot->is_viewer = 1;
                }

                $userPivot->save();
                return back();
            }

            return view('wiki.manage-permissions')->with($data);
        } else
        {
            return view('wiki.permissions-denied');
        }
    }

    /**
     * Return the user list.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function userList(Request $request,$name, $id)
    {
        $userPivot = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first(); 
    	if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1 || ($userPivot !== null && ($userPivot->is_owner ==1 || $userPivot->is_editor ==1 || $userPivot->is_viewer ==1))){
            $users = DB::select('   SELECT u.name, u.id, u.email, concat(u.name, " ", u.email) as label FROM users AS u
                                    LEFT JOIN user_pivot AS p
                                    ON u.id = p.user_id AND p.page_id = ?
                                    WHERE p.user_id IS NULL', array($id));
            $response = array();
            $response['result'] = 'success';
            $response['data'] = $users;
            return response()->json($response);
        } else {
            $response = array();
            $response['result'] = 'failed';
            return response()->json($response);
        }

    }

    /**
     * Return the available user list.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addUser(Request $request,$name, $id)
    {
        $userPivot = UserPivot::where('user_id', '=', Auth::user()->id)->where('page_id', '=', $id)->first(); 
    	if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1 || ($userPivot !== null && ($userPivot->is_owner ==1 || $userPivot->is_editor ==1 || $userPivot->is_viewer ==1))){

            $userPivot = new UserPivot();
            //default value
            $userPivot->user_id = $request->user_id;
            $userPivot->page_id = $id;
            $userPivot->is_owner = 0;
            $userPivot->is_editor = 0;
            $userPivot->is_viewer = 0;
            $userPivot->save();

            $users = DB::select('   SELECT u.name, u.id, u.email, u.name as label FROM users AS u
                                    LEFT JOIN user_pivot AS p
                                    ON u.id = p.user_id AND p.page_id = ?
                                    WHERE p.user_id IS NULL', array($id));

            $response = array();
            $response['result'] = 'success';
            $response['availableUser'] = $users;
            return response()->json($response);
        } else {
            $response = array();
            $response['result'] = 'failed';
            return response()->json($response);
        }

    }    

    private function getPages($name)
    {

        if ($name[0] == "1" and $project = \App\task::find($name))
        {
            $projectname = \App\task::find($name)->name;
            $pages = $project->pages;
            $result = [];

            foreach ($pages as $page)
            {
                if ($page->parents()->count() == 0)
                {
                    $result[] = $page;
                }
            }
        } elseif ($name[0] == "2" and $project = \App\project::find($name))
        {
            $projectname = \App\Project::find($name)->name;

            $pages = $project->pages;
            $result = [];

            foreach ($pages as $page)
            {
                if ($page->parents()->count() == 0)
                {
                    $result[] = $page;
                }
            }

        } else
        {
            $result = [];
        }
        $parm['pages'] = $result;
        $parm['name'] = $name;
        $parm['projectname'] = $projectname;
        return $parm;
    }

    /**
     * Check permissions for edit, delete, create, lock, unlock pages
     * @param $userPivot
     * @return array
     */
    protected function preparePermissions($userPivot)
    {
		$data = [];

        if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1)
        {

            $data['can_create_page'] = 1;
        }
        
	if (Auth::user()->isCompany == 1 || $userPivot->is_owner ==1)
        {
            $data['can_delete_page'] = 1;
        }

        if (Auth::user()->isExpertise ==1 || Auth::user()->isCompany == 1 || $userPivot->is_owner ==1 || $userPivot->is_editor ==1)
        {
            $data['can_edit_page'] = 1;
        }

        if (Auth::user()->isCompany == 1 || $userPivot->is_owner ==1)
        {

            $data['can_lock_page'] = 1;
        }

        return $data;
    }

    public function payment(Request $request)
    {
        $gateway = new BraintreeGateway();        
        return view('payment_form', compact('gateway'));
    }    

    public function checkout(Request $request)
    {
        $gateway = new BraintreeGateway();
        $params = [];
        $params['amount'] = 10;
        $params['payment_method_nonce'] = $request->payment_method_nonce;
        $result = $gateway->checkout($params);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;
            echo "Success " . $transaction->id;
        } else {
            $errorString = "";
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            echo $errorString;
        }        
    }
}
