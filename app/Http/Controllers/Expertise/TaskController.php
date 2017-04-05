<?php

namespace App\Http\Controllers\Expertise;

use App\skill;
use App\UserPivot;

use App\Page;
use App\task;
use View, Input, Redirect, Session, Validator,DB;
use App\Http\Controllers\Controller;
use App\ExpertiseTask as ExpertiseTaskModel;
use App\project as ProjectModel;
use DOMDocument;
use Intervention\Image\Facades\Image;
use App\MediaWiki\MediaWiki;


class TaskController extends Controller { 
	
	public function create($projectId) {
		$param['pageNo'] = 1;
		$param['projectId'] = $projectId;
		$param['tasks'] = ExpertiseTaskModel::get();
		return View::make('expertise.task.create')->with($param);
	}

	public function view($taskId){

		$task = task::find($taskId);

		return View::make('expertise.task.detail')->with('task',$task);
	}
	
	public function store() {

		$rules = ['name' => 'required',
					'description' => 'required',
					'scope' => 'required',
					'difficult' => 'required',
					'parent_id' => 'required',
					// 'start_time' => 'required',
					//'end_time' => 'required',
					//'sequence' => 'required',
					//'skill' => 'required',
		];


		$input = Input::get("input");
		$output = Input::get("output");
		$description = Input::get("description");


		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator)
			->withInput();
		} else {

			$id = 0;
			if(Input::has('task_id')) {
				$id = Input::get('task_id');
				$tasks = Task::find($id);
				$alert['msg'] = 'Task has been updated successfully';
			} else {
				$tasks = new Task;
				$tasks->project_id = Input::get('projectId');
				$alert['msg'] = 'Task has been created successfully';
			}
			$tasks->name = Input::get('name');
			
			$tasks->description  = Input::get('description');
			
			$tasks->difficult  = Input::get('difficult');
			$tasks->scope  = Input::get('scope');
			$tasks->budget  = Input::get('budget');
			$tasks->input  = Input::get('input');
			$tasks->output  = Input::get('output');
			$tasks->parent_id  = Input::get('parent_id');
			$tasks->estimateTime  = Input::get('estimateTime');
			$tasks->sequence = 1;

			// $tasks->end_time = Input::get('end_time');
			// $tasks->sequence = Input::get('sequence');
			// $tasks->expertise_id = session::get('expertise_id');
			
			$tasks->save();

			$id = ($id == 0) ? DB::getPdo()->lastInsertId() : $id;
			$task = Task::find($id);

			DB::table('skill_task')
			->where('task_id', $id)	
			->delete();

			$skill_array=explode(",", Input::get('tags'));
			foreach($skill_array as $item){
				$elem = skill::where('name',$item)->get()->first();
				if($elem)
					$task->skill()->attach($elem->id);
			}

			$page = new Page();
			$page->raw = $task->description;
			$page->title = "Task-".$task->name;
			$page->main = true;
			$page->parse();
        	$page->save();
        	$task->project->pages()->attach($page->id);
        	$task->pages()->attach($page->id);
        	$parentpage = $page;
  			$UserPivot = new UserPivot();
      		$UserPivot->page_id = $page->id;
        	$UserPivot->user_id = \Auth::user()->id;
        	$UserPivot->is_editor = 1;
        	$UserPivot->save();

        	// create wiki page with the user input

			$this->init_task_wiki($description,"description",$task,$parentpage);
			$this->init_task_wiki($input,"input",$task,$parentpage);
			$this->init_task_wiki($output,"output",$task,$parentpage);

        	// backup the wiki page in media wiki

        	$mediawiki = new mediawiki();
        	$mediawiki->savePageInMediaWiki("description",$description,$id);
        	$mediawiki->savePageInMediaWiki("input",$input,$id);
        	$mediawiki->savePageInMediaWiki("output",$output,$id);
		
			$alert['type'] = 'success';
			return Redirect::route('expertise.view', $tasks->project_id)->with('alert', $alert);
		}
	}

	public function update(){

			$rules = ['name' => 'required',
					'description' => 'required',
					// 'start_time' => 'required',
					'end_time' => 'required',
					'sequence' => 'required',
					'skill' => 'required',
		];


		$input = Input::get("input");
		$output = Input::get("output");
		$description = Input::get("description");


		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator)
			->withInput();
		} else {

			if(Input::has('task_id')) {
				$id = Input::get('task_id');
				$tasks = Task::find($id);
				$alert['msg'] = 'Task has been updated successfully';
			} else {
				$tasks = new Task;
				$tasks->project_id = Input::get('projectId');
				$alert['msg'] = 'Task has been created successfully';
			}



			$tasks->name = Input::get('name');
			
			$tasks->description  = Input::get('description');
			// $tasks->start_time = Input::get('start_time');
			// $tasks->end_time = Input::get('end_time');
			$tasks->sequence = Input::get('sequence');
			$tasks->input = Input::get('input');
			$tasks->output = Input::get('output');

			
			$tasks->save();
			$id = DB::getPdo()->lastInsertId();
			$task = Task::find($id);

			return Redirect::route('expertise.view', $tasks->project_id)->with('alert', $alert);
		}
	}

	
	public function delete($id) {
		
		$task = task::find($id);
		task::where('id',$id)->delete();
		// ExpertiseTaskModel::where('id', $id)->delete();
		$alert['msg'] = 'Project has been deleted successfully';
		$alert['type'] = 'success';
	
		return Redirect::route('expertise.view',$task->project_id)->with('alert', $alert);
	}
	
	public function edit($id) {
		$param['pageNo'] = 1;
		$result = Task::find($id);
		$param['tasks'] = $result;
		return View::make('expertise.task.edit')->with($param);
	}

	private function init_task_wiki($raw,$title, task $task,Page $parent){


		$page = new Page();
		$message = $raw;
        $dom = new DomDocument();
        $dom->loadHtml( mb_convert_encoding($message, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        $page->raw = $dom->saveHTML();

        $page->title = $title;
        $page->parse();
        $page->save();
        $task->pages()->attach($page->id);
        $parent->children()->attach($page->id);

        // bind the wiki page to user with premission

        $this->bind($page->id,$page->title);


	}

	 private function bind($id, $title)
    {
        $UserPivot = new UserPivot();
        $UserPivot->page_id = $id;
        $UserPivot->user_id = \Auth::user()->id;
        $UserPivot->is_editor = 1;
        $UserPivot->save();
        return;
        
    }
	
}
