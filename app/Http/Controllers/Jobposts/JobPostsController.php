<?php

namespace App\Http\Controllers\Jobposts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Notification;
use App\Models\Jobpost;
use Auth;
use App\Notifications\CandidateNotification;
use App\Models\Employercandidate;
use DataTables;
use App\Models\Jobsapplied;
use App\Models\Techonology;
use App\Models\User;
use App\Models\Jobpostsskill;

class JobPostsController extends Controller
{
    public function Employerjobs()
    {
        
    }
    public function employereditpost(Request $request, $id)
    {
        // dd($id);
        try{
            $userinfo = \Auth::user()->id;
            if(\Auth::user()->role == 5){
                $userinfo = \Auth::user()->belongsto;
            }
            $recuriterinfo = User::where(function ($query){
                $query->where('isactive', 1);
            })->where(function ($query) use($userinfo){
                $query->where('belongsto', $userinfo)
                        ->orwhere('id', $userinfo);
            })->get();
            $Techonologies = Techonology::where('isactive', 1)->get();
            // ->where('employer_id', Auth::user()->id)
            $postDetails = Jobpost::with(['Techonology.info', 'userdetails'])->where('id', $id)->first();
            // dd($postDetails);
            return view('Employer/editpost', compact('postDetails', 'Techonologies', 'recuriterinfo'));
        }catch(\Exception $error)
        {
            return response()->json([
                'success' => false,
                'message' => 'Something Went Wrong',
                'status' => 0
            ]);
        }
    }
    public function DeleteJob(Request $request)
    {
        try
        {
            return Jobpost::where('id', $request->id)->where('employer_id', Auth::user()->id)->update([
                'isactive' => 0,
            ]);
        }catch(\Exception $e)
        {
            return 0;
        }
    }
    public function getcandidatedetails(Request $request)
    {
        return Employercandidate::with(['addedskills.skillname'])->where('id', $request->id)->where('Employerid', \Auth::user()->id)->first();
    }
    public function viewrecivedapplications(Request $request, $id='')
    {
        // dd($id);
        
        if ($request->ajax()) {
            $data = Jobsapplied::with(['employeedetails'])->where('jobid', $id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }   
        return view('Employer/recivedapplications', compact('id'));
    }
    // public function Viewapplicantdetails($id)
    // {
        
    // }
    public function Updatepostskill(Request $request)
    {
        try{
            $Deleteskill = Jobpostsskill::where('id', $request->id)->delete();
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e)
        {
            dd($e);
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function RestoreJob(Request $request)
    {
        try
        {
            return Jobpost::where('id', $request->id)->where('employer_id', Auth::user()->id)->update([
                'isactive' => 1,
            ]);
        }catch(\Exception $e)
        {
            return 0;
        }
    }
    public function startsession(Request $request)
    {
        if($request->id == 'All')
        {
            \Session::put('posts', 'All');
            return 1;
        }elseif($request->id == 'Active'){
            \Session::put('posts', 'Active');
            return 1;
        }elseif($request->id == 'Inactive'){
            \Session::put('posts', 'Inactive');
            return 1;
        }
    }
    public function searchpost(Request $request)
    {
        $searchInput = $request->input;
        return Jobpost::where(function ($query) {
                $query->where('employer_id', '=', Auth::user()->id);
            })->where(function ($query) use($searchInput) {
                $query->where('role', "like", "%" . $searchInput . "%") 
                    ->orWhere('description', "like", "%" . $searchInput . "%")
                    ->orWhere('experience',  "like", "%" . $searchInput . "%")
                    ->orWhere('level',  "like", "%" . $searchInput . "%")
                    ->orWhere('location',  "like", "%" . $searchInput . "%")
                    ->orWhere('mode',  "like", "%" . $searchInput . "%")
                    ->orWhere('clientname', "like", "%" . $searchInput . "%")
                    ->orWhere('duration',  "like", "%" . $searchInput . "%")
                    ->orWhere('startdate',  "like", "%" . $searchInput . "%")
                    ->orWhere('Salary',  "like", "%" . $searchInput . "%")
                    ->orWhere('type',  "like", "%" . $searchInput . "%")
                    ->orWhere('number',  "like", "%" . $searchInput . "%")
                    ->orWhere('contactemail',  "like", "%" . $searchInput . "%")
                    ->orWhere('recruiter',  "like", "%" . $searchInput . "%");
            })->paginate(50);
    }
    public function jobPostClose(Request $request)
    {
        try{
            $post = Jobpost::where('id', $request->id)->first();
            return response()->json([
                'success' => true,
                'data' => $post
            ]);
        }catch(\Exception $e){
            \Log::error('getting posts'. $e);
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function jobClose(Request $request)
    {
        try{
            $post = Jobpost::where('id', $request->id)->update([
                'is_closed' => 1,
                'jobs_filled' => (int)$request->filled
            ]);
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e){
            \Log::error('closing posts'. $e);
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function viewApplications(Request $request, $id = 80){
        $data = Jobsapplied::with(['candidatedetails', 'candidateskills.skillname'])->where('jobid', $id)->where('applied_by', 2)->latest()->paginate(15);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('jobs.applications', compact('data'))->render()
            ]);
        }
        // dd($data);
        // $id = $id;
        // $data = Jobsapplied::with(['employeedetails', 'skills'])->where('jobid', 3)->latest()->get();
        // dd(\Artisan::call('optimize'));
        // $applicationsRecived = Jobsapplied::with(['employeedetails'])->where('jobid', $id)->paginate(20);
        //  $data = Jobpost::where('id', $id)->first();
        return view('jobs.recivedjobapplications', compact('id', 'data'));
    }
    public function getApplicationsRecived(Request $request, $id){
        if ($request->ajax()) {
            $data = Jobsapplied::with(['candidatedetails', 'candidateskills.skillname'])->where('jobid', $id)->where('applied_by', 2)->latest()->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">view</a> <a href="/contactemail/'.encrypt($row->employeedetails->email).'" class="edit btn btn-success btn-sm">contact Email</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function viewcandidateApplications($id){
       
        $data = Jobpost::where('id', $id)->first();
        return view('jobs/recivedcandidateapplications', compact('id', 'data'));
    }
    public function recivedcandidateapplications(Request $request, $id){
        // dd($request->all());
        if ($request->ajax()) {
            $data = Jobsapplied::with(['candidatedetails', 'candidateskills.skilldetails'])->where('jobid', $id)->where('type', NULL)->latest()->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">view</a> <a href="/contactemail/'.encrypt($row->candidatedetails->contactemail).'" class="edit btn btn-success btn-sm">contact Email</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function contactemail($id){
        $email = decrypt($id);
        return view('jobs.mailuser', compact('email'));
        //  \Mail::send(['html'=>'mails.forgotpassword'], $data, function($message) use($checkEmail) {
        //             $message->to($checkEmail, 'Job Portal')->subject
        //                 ('Forgot password');
        //             $message->from('venkat.t@softhouz.com','admin');
        // });
    }
    public function sendemail(Request $request){
        $data = $request->all();
    //     $user = User::find(\Auth::user()->id);
    // //   dd($user);
        $email ="chanduakula111@gmail.com";
    //     $messages["hi"] = "Hey, Happy Birthday";
    //     $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";

    //     // Notification::route('mail', $email)->notify(new NewBooking($email));
    //     // Notification::send($data, new CandidateNotification($data));
    //     $user->notify(new CandidateNotification($messages));


    //   //  dd($email);
        \Mail::send(['html'=>'mails.contactapplicants'], $data, function($message) use($email) {
            $message->to('chanduakula111@gmail.com', 'Job Portal')->subject
                ('application reviewed');
            $message->from('venkat.t@softhouz.com','admin');
        });
        return redirect()->back()->with('message', 'Mail Sent Successfully!');
    }
}
