<?php

namespace App\Http\Controllers\Task;

use App\Task;
use View, Input, Redirect, Session, Validator;
use App\Http\Controllers\Controller;
use App\Task as TaskModel;
use App\project as ProjectModel;
use App\skill as SkillModel;

class TaskController extends Controller { 
	
	public function index($projectId) {
		
		$param['pageNo'] = 1;
		$param['tasks'] = TaskModel::paginate(10);
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('company.task.index')->with($param);
	}

	/**
	 * @param $projectId
	 * @return mixed
     */
	public function create($projectId) {
		$param['pageNo'] = 1;
		$param['projectId'] = $projectId;
		$param['tasks'] = TaskModel::get();
		$param['skills'] = SkillModel::lists('name','name');
		return View :: make('company.task.create')->with($param);
	}
	
	public function store() {


		$rules = ['name' => 'required',
		'description' => 'required',
		'estimateTime' => 'required',
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator)
			->withInput();
		} else {
			if(Input::has('task_id')) {
				$id = Input::get('task_id');
				$tasks = TaskModel::find($id);
				$alert['msg'] = 'Task has been updated successfully';
			} else {
				$tasks = new TaskModel;
				$tasks-> project_id = Input::get('projectId');
				$alert['msg'] = 'Task has been created successfully';
			}
			$tasks-> name = Input::get('name');
			$tasks-> description  = Input::get('description');
			$tasks-> estimateTime = Input::get('estimateTime');
			$tasks-> sequence = Input::get('sequence');
			$tasks-> save();
			
			$alert['type'] = 'success';
			return Redirect::route('project.view', $tasks->project_id)->with('alert', $alert);
		}
	}
	
	public function delete($id) {
		$task = TaskModel::find($id);
		$projectId = $task->project_id;
		TaskModel::where('id', $id)->delete();
		$alert['msg'] = 'Project has been deleted successfully';
		$alert['type'] = 'success';
		
		return Redirect::route('project.view', $projectId)->with('alert', $alert);
	}
	
	public function edit($projectId,$id) {
		$param['pageNo'] = 1;
		$result = TaskModel::find($id);
		$param['tasks'] = $result;
		$param['projectId '] = $projectId;
		return View('company.task.edit')->with($param);
	}
}