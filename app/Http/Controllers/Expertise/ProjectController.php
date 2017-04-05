<?php

namespace App\Http\Controllers\Expertise;

use App\project;
use App\task;
use View, Input, Redirect, Session, Validator;
use App\Interview;
use App\Http\Controllers\Controller;
use App\project as ProjectModel;
use App\Company as CompanyModel;
use App\Question as QuestionModel;
use App\User as UserModel;
use App\TaskUser as TaskUserModel;
use App\UserProject as UserProjectModel;
use App\ExpertiseTask as ExpertiseTaskModel;
use App\Answer as AnswerModel;
use App\task as TaskModel;
use App\Student;
use App\UserPivot;
use Shokse\Notice\Facades\Notice;

use App\Services\BraintreeGateway;
use App\Transaction as TransactionModel;

use DB;
use DateTime;

class ProjectController extends Controller { 
	

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('expertise');

	}


	public function index() {
		$user = \Auth::user()->Expertise;
		$param['pageNo'] = 1;
		
		$param['projects'] = DB::table('project')->where('status', 'open')->get();
		if($user->project->count() > 0){
			$param['mprojects'] = $user->project->where('status', 'Ongoing')->unique();
			$param['iprojects'] = $user->project->where('status', 'interview')->unique();
			//$param['mprojects'] = DB::select("SELECT project.* FROM project LEFT JOIN expertise_project ON expertise_project.project_id = project.id WHERE expertise_project.expertise_id = " . $user->id ." AND project.status IN ('Ongoing', 'interview')");
		} else {
			$param['mprojects'] = array();	
			$param['iprojects'] = array();	
		}		

		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('expertise.project.index')->with($param);
	}
	
	public function view($projectId) {

		$user = \Auth::user()->Expertise;
		$param['project_list'] = ($user->project->count() > 0) ? $user->project->unique() : array();

		$param['pageNo'] 				= 1;
		$param['projectId'] 		= $projectId;
		$param['project'] 			= ProjectModel::find($projectId);
		$param['tasks'] 				= ProjectModel::find($projectId)->tasks;
		$param['root_tasks'] 		= DB::table('tasks')->where('parent_id', 0)->where('project_id', $projectId)->get();//ProjectModel::find($projectId)->tasks->where('parent_id', 0);
		$param['parent_tasks'] 	= ProjectModel::find($projectId)->tasks;//DB::select('SELECT t.* FROM tasks as t LEFT JOIN tasks as tt ON t.id = tt.parent_id WHERE (tt.id is NULL OR t.parent_id = 0) AND t.project_id = '.$projectId . ' GROUP BY t.id');
		$param['users'] 				= UserModel::get();

		$param['week_tasks'] 		= $this->get_weekly_tasks($projectId);

		$current_date = date('Y-m-d');
		$param['board_tasks']['urgent'] 	  = DB::table('tasks')->whereRaw("DATE_FORMAT(DATE_ADD(start_time,INTERVAL estimateTime-1 DAY), '%Y-%m-%d') = '".$current_date."' AND completed = 0 AND project_id = ". $projectId)->get();
		$param['board_tasks']['late'] 	  	= DB::table('tasks')->whereRaw("DATE_FORMAT(DATE_ADD(start_time,INTERVAL estimateTime DAY), '%Y-%m-%d') <= '".$current_date."' AND completed = 0 AND project_id = ". $projectId)->get();
		$param['board_tasks']['ontime'] 	  = DB::table('tasks')->whereRaw("DATE_FORMAT(DATE_ADD(start_time,INTERVAL estimateTime-2 DAY), '%Y-%m-%d') >= '".$current_date."' AND completed = 0 AND project_id = ". $projectId)->get();
		$param['board_tasks']['complete'] 	= DB::table('tasks')->where('completed', 1)->where('project_id', $projectId)->get();
				
		if (Session::has('message')) {
		 	$param['message'] = Session::get('message');
		}
		return View::make('expertise.project.view')->with($param);
	}

	public function get_end_date_project($projectId){
		$last_date = DB::select('SELECT DATE_ADD(start_time,INTERVAL estimateTime DAY) AS end_date FROM tasks WHERE project_id = '.$projectId.' ORDER BY end_date DESC limit 1');
		if($last_date)
			return $last_date[0]->end_date;
		else
			return '';
	}

	public function get_end_date_task($taskId){
		$last_date = DB::select('SELECT DATE_FORMAT(DATE_ADD(created_at,INTERVAL estimateTime DAY), "%m/%d/%Y") AS end_date FROM tasks WHERE id = '. $taskId);
		return $last_date[0]->end_date;
	}

	public function get_weekly_tasks($projectId){
		$project_end_date = 		$this->get_end_date_project($projectId);
		$project = ProjectModel::find($projectId);
		$start_date = new DateTime($project->created_at);
		$end_date = new DateTime($project_end_date);
		
		$start_week = $start_date->format('W') - 1;
		$end_week = $end_date->format('W') - 1;
		$current_year = $start_date->format('Y');

		$pt_week_date = $this->get_start_and_end_date($start_week, $current_year)[0];
		$result = [];

		while($pt_week_date <= $end_date->format('Y-m-d')){
			$next_week_date = date('Y-m-d', strtotime($pt_week_date, time()) + 7*24*3600);

			// Get progressing Tasks => completed : 0 && status > 1
			$result[] = DB::table('tasks')->select('tasks.*', 'page_task.page_id')->leftJoin('page_task', 'page_task.task_id', '=', 'tasks.id')->whereRaw("tasks.completed = 0 AND tasks.status > 1 AND DATE_FORMAT(tasks.start_time, '%Y-%m-%d') >= '".$pt_week_date."' AND DATE_FORMAT(tasks.start_time, '%Y-%m-%d') < '".$next_week_date."' AND tasks.project_id = ". $projectId)->groupBy("tasks.id")->get();
			$pt_week_date = $next_week_date;
		}
		return $result;
	}

	public function get_start_and_end_date($week, $year)
	{

			$time = strtotime("1 January $year", time());
			$day = date('w', $time);
			$time += ((7*$week)-$day)*24*3600;
			$return[0] = date('Y-m-d', $time);
			$time += 7*24*3600;
			$return[1] = date('Y-m-d', $time);
			return $return;
	}

	public function get_task_developer($taskId){
			$task = TaskModel::find($taskId);
			$applied_students = $task->applied_students()->get();
			$result = [];
			foreach ($applied_students as $item){
				$app_user['name'] = UserModel::find($item['user_id'])->name;
				$app_user['id'] = $item['id'];
				$result[] = $app_user;
			}
			return response()->json(['status' => 'ok', 'developer' => $result]);							
	}

	public function get_task_detail($taskId){
		$result = TaskModel::find($taskId);
		$result['end_date'] = 'DUE TO ' . $this->get_end_date_task($taskId);
		$elem_status = $this->get_status_label($result['start_time'], $result['estimateTime'], $result['completed']);	
		$result['task_status'] = $elem_status['status'];

		$developer_names = '';
		foreach($result->assigned_students as $item){
			$developer_names .= $item->user->name . ', ';
		}		
		$result['developer'] = $developer_names;

		$skill = '';
		foreach($result->skill as $item){
			$skill .= $item->name . ', ';
		}
		if(count($result->skill))
			$result['skills'] = substr($skill, 0, -2);

		$skillset = [];		
		$project_skills = ProjectModel::find($result->project_id)->skill;
		foreach($project_skills as $item){
			$skillset[] = $item->name;
		}	
			
		return response()->json(['status' => 'ok', 'task' => $result, 'skillset' => $skillset]);		
	}

	public function get_applied_tasks($projectId){
		$task_list 				= ProjectModel::find($projectId)->tasks;		
		$result = [];
		foreach ($task_list as $elem){
			$submission  = TaskModel::find($elem['id'])->submission->last();
			$validated = 0;
			if($submission){
				$validated = (TaskModel::find($elem['id'])->submission->last()->validated == 1) ? 1 : 0;
			} else {
				$validated = 0;
			}
			
			$count = $elem->applied_students()->get()->count();
			if($count > 0 || $validated == 1)
				$result[] = $elem->id;
		}		
		return response()->json(['status' => 'ok', 'task' => $result]);		
	}

	public function get_task_tree($projectId){
		$task_list 				= ProjectModel::find($projectId)->tasks;		

		if(count($task_list) == 0)
			return response()->json(['status' => 'ok', 'task_tree' => $task_list]);		

		$task_tree = array();
		foreach ($task_list as $elem){
			$info_elem['id'] = $elem['id'];
			$info_elem['name'] = $elem['name'];
			$elem_status = $this->get_status_label($elem['start_time'], $elem['estimateTime'], $elem['completed']);
			$info_elem['title'] = $elem_status['title'];
			$info_elem['parent_id'] = $elem['parent_id'];
			$submission  = TaskModel::find($elem['id'])->submission->last();
			if($submission){
				$info_elem['validated'] = (TaskModel::find($elem['id'])->submission->last()->validated == 1) ? 1 : 0;
			} else {
				$info_elem['validated'] = 0;
			}

			$info_elem['applied_students'] = $elem->applied_students()->get();
			/*
			$applied_students = $elem->applied_students()->get();
			foreach ($applied_students as $item){
				$app_user['name'] = UserModel::find($item['user_id'])->name;
				$app_user['id'] = $item['id'];
				$info_elem['applied_students'][] = $app_user;
			}
			*/

			$info_elem['status'] = $elem['status'];

			if ($info_elem['validated'] == 1 || count($info_elem['applied_students']) > 0){
				$info_elem['className'] = 'col_box highlight '.$elem_status['status'];
			} else {
				$info_elem['className'] = 'col_box '.$elem_status['status'];
			}			

			$task_tree[$elem['parent_id']][] = $info_elem;
		}

		foreach ($task_tree[0] as $elem){
			$tree_result[] = $this->create_tree($task_tree, array($elem))[0];
		}

		return response()->json(['status' => 'ok', 'task_tree' => $tree_result]);		
	}

	public function get_status_label($created_at, $estimate, $completed){
		$creatDate = new DateTime($created_at);
		$currentDate = new DateTime();

		$diff = $creatDate->diff($currentDate)->format("%r%a");		
		$result = [];
		if( $completed == 1 ){
			$result['title']= "COMPLETED & CONFIRMED";
			$result['status'] ="complete";
		}
		else if( (int)$diff < $estimate - 1 ){
			$result['title']= "ON TIME";
			$result['status'] ="ontime";			
		}
		else if( (int)$diff <= $estimate ){
			$result['title']= "URGENT";
			$result['status'] ="urgent";			
		}
		else if($created_at == '0000-00-00 00:00:00'){
			$result['title']= "READY";
			$result['status'] ="ready";
		}
		else if( (int)$diff > $estimate ){
			$result['title']= "LATE";
			$result['status'] ="late";			
		}
		return $result;	
	}

	public function create_tree(&$list, $parent){
			$tree = array();
			foreach ($parent as $k=>$l){
					if(isset($list[$l['id']])){
							$l['children'] = $this->create_tree($list, $list[$l['id']]);
					}
					$tree[] = $l;
			} 
			return $tree;
	}

	public function view_test($projectId) {
		$param['pageNo'] 				= 1;
		$param['projectId'] 		= $projectId;
		$param['project'] 			= ProjectModel::find($projectId);
		$param['tasks'] 				= ProjectModel::find($projectId)->tasks;
		$task = ProjectModel::find($projectId)->tasks;
		$param['users'] 				= UserModel::get();
		$param['project_list'] 	= ProjectModel::find($projectId);
				
		if (Session::has('message')) {
		 	$param['message'] = Session::get('message');
		}
		return View::make('expertise.project.view_test')->with($param);
	}

	public function download($id){
		$task = task::find($id);
		$pathToFile= $task->submission->first()->file_path;
		return response()->download($pathToFile);
	}

	public function deny($id){
		$task = task::find($id);
		$task->submission->last()->validated = 0;  // 3: rejected-pending before developer confirmed;
		$task->submission->last()->save();
		$task->isCommited = 0;
		$task->save();

		$ids = [];
		foreach ($task->assigned_students()->get() as $item)
		{
				$ids[] = $item->user_id;
		}

		$data = [
				'receiver_ids' => $ids,
				'content' => [
						'type' => 'task',
						'id' => $id,
						'title' => $task->name
				]
		];

		// // Trigger a listener
		Notice::task()->denied_msg($data);
		return Redirect::back()->with('message','Operation Successful !');
	}

	public function accept($id, $user_id){
		$task = task::find($id);
		if(!$task->applied_students()->get()->contains($user_id)){
			return Redirect::back()->with('message','Operation Successful !');
		}

		/**************Checkout Ready for task from client********************/
		/*
		$gateway = new BraintreeGateway();

		$project = $task->project()->get()->first();
		$company = CompanyModel::find($project->company_id);
		$user = $company->user()->get()->first();
		$payment_method = $user->payment_method()->get()->first();
	
		if(is_null($payment_method) || $payment_method->method_id == ''){
			return Redirect::back()->with('message','Client Payment method is not ready now!');
		}

		$users = $task->applied_students()->get();
		foreach($users as $item){
			if($item->id != $user_id){
				$item->tasks()->detach($id);
			} else {
				$pending_tasks = $item->pending_tasks()->get();
				foreach($pending_tasks as $elem){
					if($elem->id != $id){
						$elem->status = 0;
						$elem->save();						
						$item->tasks()->detach($elem->id);
					}
				}
			}
		}
		*/

		/*********Checkout for task from client****************/
		/*
		$params = [];
		$params['amount'] = $task->budget;
		$params['payment_method_token'] = $payment_method->method_id;
		$result = $gateway->checkoutByPaymentMethod($params);
		
		$transaction = TransactionModel::where('task_id', $task->id)->get()->first();
		$is_success = false;
		if(is_null($transaction)){
			$transaction = new TransactionModel;
			$is_success = false;
			if ($result->success || !is_null($result->transaction)) {
				$transaction->user_id = $user->id;
				$transaction->transaction_id = $result->transaction->id;
				$transaction->project_id 		 = $project->id;
				$transaction->task_id 			 = $task->id;
				$transaction->amount 				 = $params['amount'];
				$transaction->payment_type 	 = 'checkout';
				$transaction->save();
				$is_success = true;
			} else {
					$errorString = "";
					foreach($result->errors->deepAll() as $error) {
							$errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
					}
			}
		} else {
			$is_success = true;
		}
		*/
		
		// When Disable Depoist Project, Add temporary code, this should be removed later
		$is_success = true;

		if($is_success){
			$task->start_time = date_format(date_create(),"Y-m-d H:i:s");
			$task->status =2;
			$task->save();
			return Redirect::back()->with('message','Operation Successful !');
		} else {
			return Redirect::back()->with('message','Checkout for task is failed !');
		}

//		$user = Student::find($task->students->first()->id);
//		$user->tasks()->detach($id);

	}

	public function reject($id){
		$task = task::find($id);
		$task->status =0;
		$task->save();


//		$user = Student::find($task->students->first()->id);
//		$user->tasks()->detach($id);

		return Redirect::back()->with('message','Operation Successful !');		
	}

	public function validating($id){

		$task = task::find($id);
		$task->submission->last()->validated = 2;
		$task->submission->last()->save();
		$task->completed +=1;
		$task->save();

		$ids = [];
		foreach ($task->assigned_students()->get() as $item)
		{
				$ids[] = $item->user_id;
		}

		$data = [
				'receiver_ids' => $ids,
				'content' => [
						'type' => 'task',
						'id' => $id,
						'title' => $task->name
				]
		];

		// // Trigger a listener
		Notice::task()->validated_msg($data);

		return Redirect::back()->with('message','Operation Successful !');

	}

 	public function admin($projectId){

        $user = \Auth::user()->expertise;

        $user->project()->attach($projectId);
        $user->project()->state = 2;
        
        $project = project::find($projectId);

        foreach($project->pages as $page){
	        $UserPivot = new UserPivot();
	        $UserPivot->user_id = \Auth::user()->id;
	        $UserPivot->page_id = $page->id;
	        $UserPivot->save();
    	}

        //$project->status = "Ongoing";
		$project->status = "interview";
        $project->save();

        $receiver_ids[] = CompanyModel::find($project->company_id)->user_id;

		$data = [
				'receiver_ids' => $receiver_ids,
				'content' => [
						'type' => 'project',
						'id' => $project->id,
						'title' => $project->name
				]
		];

		// // Trigger a listener
		Notice::project()->interview($data);

        $interview = new Interview;
        $interview->project_id = $projectId;
        $interview->company_id = $project->company_id;
        $interview->expertise_id = $user->id;
        $interview->interview_time = date("Y-m-d H:i:s");
        $interview->status = 'interview';
        $interview->save();

        \Session::flash('flash_message','You Admined the project successful');
        return Redirect::back();
    }
}
