<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Controllers\Controller;
use App\project;
use App\Company;
use App\task;
use App\Page;
use App\User;
use App\Interview;
use App\skill;
use App\UserPivot;
use App\Expertise;
use App\MediaWiki\MediaWiki;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash; // to compare password
use Illuminate\Http\Request; 
use SimpleSoftwareIO\SMS\Facades\SMS;
use Shokse\Notice\Facades\Notice;

use Mail;
use DB;
use App\Transaction;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company');

    }

    public function index()
    {
        return view('client.app');
    }

    public function post(){
        $user = \Auth::user();
        $skills = skill::all();

        return view('lazylogin',compact('skills'));
    }

    public function manage(){
        $projects = \Auth::user()->company->project;// condition added to show only open project's
        $company = \Auth::user()->company;
		
		if($projects->first() == null){
			return view('lazylogin');
		}
			return view('client.Manage',compact('projects', 'company'));
    }

    public function transaction(){
        $user = \Auth::user();

        $transactions = Transaction::where('user_id', $user->id)->where('project_id',  '>', 0)->orderBy('project_id', 'DESC')->orderBy('task_id', 'ASC')->get();
        $deposit_trans = Transaction::where('user_id', $user->id)->where('task_id', 0)->where('project_id', 0)->get()->first();

        return view('client.transaction',compact('transactions', 'deposit_trans'));
    }

    public function invite(){
        $isSent = false;
        return view('client.invite', compact('isSent'));
    }

    public static function quickRandom($length = 40)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public function postInvite(){
        $user = \Auth::user();
        $data = [
                    'invitation_code' => $this->quickRandom(),
                    'company_name' => $user->company_name,
                    'client_name' => $user->name,
                    'client_email' => $user->email
                ];
        $info = [
            'email' => Input::get('email'),
            'name' => $user->name,
            'subject' => 'Invitation from Shokse',
        ];

        Mail::send('mail_template.inviteEmail', $data, function ($message) use ($info) {
            $message->to($info['email'], $info['name'])
            ->subject($info['subject']);
        });

        $isSent = true;
        return view('client.invite', compact('isSent'));
    }

    public function progress($id){
        $user = \Auth::user();
        $project = Project::find($id);
		
		$pages = $project->pages; //to get page information
		
		
		//print_r($project);exit;
        if($project->tasks()->where('status','=',0)->first()){        			
            return view('client.progress',compact('project','user','pages'));
        }
        else{
            return view('client.empty',compact('project','user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $ProjectInfo = $request->all();
		
        $ProjectInfo['company_id'] = \Auth::user()->company->id;
        project::create($ProjectInfo);
		 
        $project = project::find(\DB::getPdo()->lastInsertId());

        $tags = Input::all()["tags"];
        foreach ($tags as $tag) {
            if(is_numeric($tag)){
                $skill = skill::find($tag);
		try{
                $project->skill()->attach($skill->id);}
		catch(\Exception $e){
		}
            }
            elseif(gettype($tag) =="string"){
                $skill = skill::create(['name'=>$tag]);
                $project->skill()->attach($skill->id);
            }
            else{
                // dd(gettype($tag));
            }
        };

        $mediawiki = new mediawiki();

        $page = new Page();
        $page->title = 'Client Requirement';
        $page->raw = $project->description;
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);

        $page = new Page();
        $page->title = 'Q&A';
        $page->raw = "Please share us your questions or concern";
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);



        $page = new Page();
        $page->title = 'Feedback';
        $page->raw = "Please write your feedback here";
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);


        //wiki page added to create agreement page
        $page = new Page();
        $page->title = 'Agreement';
        $page->raw = "Please write your agreement here";
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);

        // When Disable Depoist Project Logic, Add temporary code, this should be removed later
        $project->status = 'open';
        $project->save();

/*
        // Deposit Project
        if(Transaction::where('user_id', \Auth::user()->id)->where('task_id', 0)->where('project_id', 0)->get()->count() == 0){
            $project->status = 'deposit';
            $project->save();
            return Redirect::to('client/deposit/'.$project->id);            
        }

        $deposit_transaction = Transaction::where('user_id', \Auth::user()->id)->where('task_id', 0)->where('project_id', 0)->get()->first();

        $deposit_transaction->project_id = $project->id;
        $deposit_transaction->save();
*/



        \Session::flash('flash_message','You create the project successfully.');				

        return Redirect::to('client/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	// to delete /end project
	public function delete(Request $request)
    {	
		//to verify password before end project
		if (Hash::check(Input::get('password'), auth()->user()->password)) {
			// to update project
			$project = Project::find(Input::get('id'));
			$project->isDelete = 1; //update delete flag
			$project->delete_reason = Input::get('delete_reason'); //delete reason
			$project->status = "Completed";//change open to completed
			$project->save();
						
			$request->session()->flash('delete-success', 'Record Deleted Successfully');
		}
		else{
			$request->session()->flash('delete-error', 'Please enter correct password');
		}
		return Redirect::back();
    }

    public function profile(){
        $user = \Auth::user();
        $company = $user->company;
        return view('client.profile',compact('company','user'));
    }

    public function store_profile(Request $request){
        $profile_info = $request->all();
        $user = \Auth::user();

        $company = $user->company;
        
        $destinationPath = public_path('app/avatar/'.$user->id);
        $extension = Input::file('avatar')->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        Input::file('avatar')->move($destinationPath, $fileName);
        
        $user->name         = $profile_info['personal_name'];
        $user->company_name = $profile_info['company_name'];
        $user->country      = $profile_info['country'];
        $user->avatar       = '/app/avatar/'.$user->id.'/'.$fileName;
        $user->save();

        $company->name          = $profile_info['name'];
        $company->address       = $profile_info['address'];
        $company->vat           = $profile_info['vat_number'];
        $company->industry      = $profile_info['industry'];
        $company->bank_name     = $profile_info['bank_name'];
        $company->bank_account  = $profile_info['bank_account'];
        $company->bank_vat      = $profile_info['bank_vat'];
        $company->save();

        return Redirect::to('client/manage');
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

    //to change status of notice
    public function noticemarkread()
    {
       // $user = Auth()->user()->id;
        //\DB::table('notifications')->where('receiver_id', $user)->update(['status' => 1]);
        \Notice::allread(Auth()->user()->id);
        return;
    }

    //to get notifications
    public function get_notifications(){
        return view('notifications');
    }
    // to get count of unread notification
    public function notificationscount(){
        $count = count(\Notice::text()->unread());
        return $count;
    }

    public function get_interview($client_id){
        $interview = Interview::where('company_id', $client_id)->where('status', 'interview')->get()->first();
        if(!$interview){
            return response()->json(['status' => 'ok']);
        }

        $project = Project::find($interview->project_id);
        $expertise = Expertise::find($interview->expertise_id);
        $user = '';
        if($expertise){
            $user = User::find($expertise->user_id);            
        }
        return response()->json(['status' => 'ok', 'project' => $project, 'expertise'=> $user, 'interview'=>$interview]);
    }

    public function skip_interview($userId, $projectId){
        $expertId = User::find($userId)->expertise->id;        
        DB::table('expertise_project')->where('project_id', $projectId)->where('expertise_id', $expertId)->delete();
        $project = Project::find($projectId);
        $project->status = 'open';
        $project->save();

        $interview = Interview::where('project_id', $projectId)->where('status', 'interview')->get()->first();
        $interview->status = 'closed';
        $interview->save();

        return response()->json(['status' => 'ok']);							        
    }

    public function accept_interview($companyId, $projectId){
        $userId = Input::get('user_id');
        $project = Project::find($projectId);
        $interview_time = Input::get('interview_time');
        $interview_message = Input::get('message');

        $expertId[] = User::find($userId)->expertise->id;

        $data = [
                'receiver_ids' => $expertId,
                'content' => [
                        'type' => 'project',
                        'id' => $project->id,
                        'title' => $project->name,
                        'time' => $interview_time,
                        'message' => $interview_message
                ]
        ];

        // // Trigger a listener
        Notice::project()->accept_interview($data);

        $interview = Interview::where('project_id', $projectId)->get()->first();
        $interview->interview_time = $interview_time;
        $interview->message = $interview_message;
        $interview->status = 'accepted';
        $interview->save();

        return response()->json(['status' => 'ok']);
    }

}
