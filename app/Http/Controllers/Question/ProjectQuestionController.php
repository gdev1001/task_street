<?php

namespace App\Http\Controllers\Question;

use App\project;
use App\Task;
use View, Input, Redirect, Session, Validator, Mail;
use App\Http\Controllers\Controller;
use App\project as ProjectModel;
use App\Company as CompanyModel;
use App\Question as QuestionModel;
use App\TaskUser as TaskUserModel;
use App\Answer as AnswerModel;
use App\Task as TaskModel;
use App\UserProject;
use App\User as UserModel;
use App\Student;


class ProjectQuestionController extends Controller { 
	
	public function index() {
		
		$param['pageNo'] = 2;
		$param['answers'] = AnswerModel::groupBy('user_id','project_id')->paginate(10);
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('question.user')->with($param);
	}
	
	public function question($id, $userId) {
		
		$param['pageNo'] = 2;
		$param['projectId'] = $id;
		$param['userId'] = $userId;
		$param['answers'] = AnswerModel::where('project_id', $id)->where('user_id', $userId)->get();
		
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('question.question')->with($param);
	}
	
	public function store() {
		$param['pageNo'] = 1;
		$projectId = Input::get('project_id');

		$userId = Input::get('user_id');
		$user = student::find($userId);
		$userProject =userProject::where('project_id',$projectId)->where('student_id',$userId)->get()->last();
		$userProject->status = TRUE;
		$userProject->save();
		
//		$data = ['companyName' => $user->name];
//		$info = [
//			'reply_name' => $userProject->project->company->user->name,
//			'reply_email' => $userProject->project->company->user->email,
//			'email' => $user->user->email,
//			'name' => $user->user->name,
//			'subject' => 'Company Allowed to Start Project',
//		];
//		Mail::send('mail_template.notiToUser', $data, function ($message) use ($info) {
//			$message->from($info['reply_email'], $info['reply_name']);
//			$message->to($info['email'], $info['name'])
//			->subject($info['subject']);
//		});
//
		return Redirect::route('project');
	}
}