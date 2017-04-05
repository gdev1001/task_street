<?php

namespace App\Http\Controllers\Question;

use App\project;
use App\Task;
use View, Input, Redirect, Session, Validator, Mail;
use App\Http\Controllers\Controller;
use App\Question as QuestionModel;
use App\Answer as AnswerModel;
use App\Task as TaskModel;
use App\TaskUser as TaskUserModel;
use App\UserProject as UserProjectModel;
use Illuminate\Http\Request;

class QuestionController extends Controller { 
	
	public function index($id) {
		$param['pageNo'] = 1;
		$param['questions'] = QuestionModel::where('project_id', $id)->get();
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		$param['project_id'] = $id;
		return View::make('question.index')->with($param);
	}
		
	public function store(request $request) {
		
		$user = \Auth::user();
		$user_id=$user->id;
		
		$project_id=Input::get('project_id');

		if(!Input::get('answer')){
			$user->student->projects()->sync([$project_id=>['status' => 'false']]);
			$alert['msg'] = 'Answer has been sent successfully';
			$alert['type'] = 'success';
			$alert['project_id'] = $project_id;
			return redirect('/profile')->with('alert', $alert);
		}
		foreach (Input::get('answer') as $key => $answer) {

			$id = Input::get('project_question_id')[$key];
			$answers = new AnswerModel;
			$answers->answer = $answer;
			$answers->user_id = $user_id;
			$answers->project_question_id = $id;
			$answers->project_id = $project_id;

			$answers->save();
		}


// 		$task_user = new TaskUserModel;
// 		$task_user->user_id = $user_id;
 		$task = TaskModel::where('project_id', $project_id)->get();
// 		$task_id = $task[0]->id;
// 		$task_user->task_id = $task_id;
// 		$task_user->save();
		
		$userProject = new UserProjectModel;
		$userProject->user_id = $user_id;
		$userProject->project_id = $project_id;
		$userProject->status = FALSE;
		$userProject->save();
		
		$data = ['userName' => $user->name];
		
		$info = [
			'reply_name' => $user->name,
			'reply_email' => $user->email,
			'email' => $task[0]->project->company->email,
			'name' => $task[0]->project->company->name,
			'subject' => 'User Start Project',
		];
		
		Mail::send('mail_template.notiToCompany', $data, function ($message) use ($info) {
			$message->from($info['reply_email'], $info['reply_name']);
			$message->to($info['email'], $info['name'])
			->subject($info['subject']);
		});
		
		
		$alert['msg'] = 'Answer has been sent successfully';
		$alert['type'] = 'success';
		
		return redirect('/profile')->with('alert', $alert);
		
	}
	
	public function message() {
		
		return View::make('question.message');
		
	}
}