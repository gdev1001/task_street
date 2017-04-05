<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\project;
use App\task;
use App\User;
use App\TaskUser;
use App\submission;
use Input;
use Request;
use Session;
use Redirect;
use Vinkla\GitLab\Facades\GitLab;
use flash;
use DB;
use Mail;
use Illuminate\Routing\Route;
use Shokse\Notice\Facades\Notice;

class ProjectController extends Controller
{
    public function __construct(Route $route){
        $this->middleware('auth', ['except' => ['approve','reject']]);
		$currAction = explode('@',$route->getActionName());
		if(!(isset($currAction[1]) && in_array($currAction[1],array('approve','reject')))){
			$this->middleware('student');
		}
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $student = \Auth::user()->Student;
        $pending_count = $student->working_tasks()->count();
        if($pending_count > 0){
            return Redirect::to('profile');
        }

        $collection = collect();
        //$tasks = task::all();
        $tasks = DB::table('tasks as t')->select('t.*')->leftJoin('tasks as tt', 't.parent_id', '=', 'tt.id')->whereRaw("t.parent_id = 0 OR tt.completed = 1")->groupBy("t.id")->get();

        $user = \Auth::user()->student;
        $status = '';
        $applied = $user->applied_tasks->count();
        if ($user->applied_tasks->count() == 3){
            $status = 'overflow';
        } elseif ($task->applied_students()->get()->count() == 2){
            $status = 'full';
        }
        
        return view('project.test',compact('tasks','student', 'status', 'applied'));
    }

    //to get frelancer page data from ajax
    public function get_projects(){

        $projects = project::latest()->get();

        $student = \Auth::user()->Student;

        $collection = collect();
        $tasks = task::all();
        $results = "";
        foreach ($tasks as $task) {
            $match = 0;
            foreach ($task->skill()->get() as $skill) {
                if ($student->user()->get()->first()->skill()->get()->contains($skill->id)) {
                    $match++;
                    //dd($task);
                }
            }
            if($task->skill()->count()!=0){
            $match /= $task->skill()->count();}
            else{
             $match = 0;   
            }
            //$match = round($match);
            $task->setMatch($match);
            $collection->push($task);
            $results = $results . $task->id . $task->skill()->get() . " \n";
        }
        $tasks = $collection->sortByDesc(function ($task, $key) {
                            $match = $task->getMatch();
                            //$task->setMatch((string) $match . "%");
                            return $match;
                            });

        //$tasks = task::all()->where('status','=','0');// = not working on server
        // $tasks = task::all()->where('status',0);
      
        return view('project.freelancer',compact('tasks'));

    }

    public function completeTask($Projectid){
        $id = Input::get("id");
        $user = \Auth::user()->student;

        $task = task::find($id);

        $task->status = 0;
        $task->save();

        \Session::flash('flash_message','You joined the task successful');
        return "success";
    }

    public function getAjax($Projectid){

        $id = Input::get("id");
        $user = \Auth::user()->student;
        $task = task::find($id);
        if($user->applied_tasks->contains($id)){
            \Session::flash('flash_message','You have already joined this task');            
            return response()->json(['status' => 'fail']);
        } elseif ($user->applied_tasks->count() == 3){
            \Session::flash('flash_message','You have already joined 3 tasks. You unable to join anymore now.');
            return response()->json(['status' => 'overflow']);
        } elseif ($task->applied_students()->get()->count() == 2){
            \Session::flash('flash_message','2 users have already applied this task. You unable to join this task now.');
            return response()->json(['status' => 'full']);
        }

		$user->tasks()->detach($id);
        $user->tasks()->attach($id);
        
        $task = $user->committed_tasks()->get()->first();
        if($task){
            $task->status = 0;
            $task->save();
        }

        $task = task::find($id);
        $task->status = 1;
        $task->completed = 0;
        $task->isCommited = 0;
        $task->save();

        \Session::flash('flash_message','You joined the task successful');
        return response()->json(['status' => 'success', 'applied' => $user->applied_tasks->count()]);
    }

    public function getUserMessages(){
        $type = Input::get('type');
        $user = \Auth::user()->Student;
        if($type == 'pending_task'){
            $pending_count = $user->working_tasks()->count();
            if($pending_count > 0){
                return "redirect";
            }
        } else if($type == 'commit_status'){
            $data = Notice::flash()->get();
            return $data;
        }
        return "none";
    }

    public function decide($id)
    {
        //need to get data froP database
        $project = Project::find($id);
        $user = \Auth::user();
        $tasks = Project::find($id)->tasks;
        $count = $tasks->count();

        return view('project.profile',compact('project','tasks','count'));
    }


    public function profile()
    {
	    $user = \Auth::user()->student;
        $task = $user->committed_tasks()->get()->first();

	    if($task == null){
            $task = $user->working_tasks()->get()->first();
            if($task == null){
		        return Redirect::to('project');
            }
	    }

        $page = $task->pages()->get()->first();
        $completed_tasks = $user->completed_tasks()->get();       
        $next_task = $user->working_tasks()->get()->first();
        $pending_count = $user->working_tasks()->get()->count();
        
        return view('project.profile',compact('task', 'page', 'completed_tasks', 'next_task', 'pending_count'));
    }

    public function tasks($id){

        $task = task::find($id);
        $user = \Auth::user()->student;

        return view('project.tasks',compact('task','user'));

    }

    public function store()
    {

    }

    public function upload()
    {
        $user = \Auth::user()->student;
        
        $file = array('file' => Input::file('zip'));
        $destinationPath = storage_path('task/'.$user->id);
        $extension = Input::file('zip')->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        Input::file('zip')->move($destinationPath, $fileName);
        Session::flash('success', 'Upload successfully'); 

        $submission = new submission;
        $submission->file_path = $destinationPath.'/'.$fileName;
        $submission->task_id = $user->working_tasks->first()->id;
        $submission->user_id = $user->id;
        $submission->validated =1;
        $submission->save();
	
        $task = task::find($user->working_tasks->first()->id);
		$task->isCommited = 1; // to set flag as task is committed
		$task->save();
			
		return Redirect::to('profile');
        
    }

    public function asyncStart() {
        $projectId = Input::get('project_id');
        $user = \Auth::user();

        $task  = TaskModel::where('project_id','=',$projectId)->firstOrFail();

        if (TaskUser::where('user_id', $user->id)->where('task_id', $task->id)->get()->count() == 0) {
            $userTask = new TaskUser;
            $userTask->user_id = $user->id;
            $userTask->task_id = $task->id;
            $userTask->question_check = 1;
            $userTask->save();
        }

        return Response::json(['result'=>'success']);
    }

    public function compile()
    {
    	return view('project.repo');
    }
	
		
	// TO UPDATE STATUS(Approve) AND SEND MAIL
	public function approve($taskid)
    {
		$task = task::find($taskid);
					
		$task->completed = 1; // to change task status as approved
		$task->isCommited = 0;// to reset committed flag
        $task->save();
		
		$users =   task::find($taskid)->students->first()->user;	// to get user details who belongs task
		//echo "<pre>";
		//print_r($users);exit;
		$info = [
			'email' => $users->email,
			'name' => $users->name,
			'subject' => 'Task Approval',
			];
		$data = ['taskName' => $task->name];  // to send name of task in mail view
		// to sent mail to user whose task is approved
		Mail::send('mail_template.notifyTaskApprove', $data, function ($message) use ($info) {
			$message->to($info['email'], $info['name'])
			->subject($info['subject']);
		});
		echo "Task Approved and Approval Email has been sent";
    }
	
	// TO UPDATE STATUS(Reject) AND SEND MAIL	
	public function reject($taskid)
    {
		$task = task::find($taskid);
						
		$task->completed = 2; // to changes task status as rejected
		$task->isCommited = 0; // to reset committed flag
        $task->save();
		
        $users =   task::find($taskid)->students->first()->user;	// to get user details who belongs task
		
		$info = [
			'email' => $users->email,
			'name' => $users->name,
			'subject' => 'Task Reject',
			];
		$data = ['taskName' => $task->name]; // to send name of task in mail view
		// to sent mail to user whose task is rejected
		Mail::send('mail_template.notifyTaskReject', $data, function ($message) use ($info) {
			$message->to($info['email'], $info['name'])
			->subject($info['subject']);
		});
		echo "Task Rejected and Rejection Email has been sent";
    }
    //to get developer notifications
    public function user_notifications(){
        $user = \Auth::user()->student;
        $task = $user->working_tasks()->get()->first();
        return view('project.notifications',compact('task'));
    }
    //to change status of notice
    public function user_noticemarkread()
    {
       \Notice::allread(\Auth::user()->student->user_id);
       return; 
    }
    // to get count of unread notification
    public function user_notificationscount(){

        $user = \Auth::user()->student;
        $task = $user->working_tasks()->get()->first();
        $i=0;
       
        if($task)
        {  
            if($task->isCommited != 1){
                $task_date = (strtotime($task->created_at)+172800);
                $now = time();
                $task_time = $task_date-$now;
                $task_hours = floor($task_time / (3600));
                if($task_hours< 48){
                     $i=1;
                }
            }
        }   
       
        $count = count(\Notice::text()->unread());
        return $count+$i;
    }
	
	
}

