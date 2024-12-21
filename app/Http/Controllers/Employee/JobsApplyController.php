<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobpost;
use App\Models\Techonology;
use App\Models\Appliedpost;
use App\Models\Employercandidate;
use App\Models\Jobsapplied;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;


class JobsApplyController extends Controller
{
    public function ApplyJob(Request $request)
    {
        $page = 'apply';
        // dd('fdfd');
        $query = Jobpost::where('is_closed', NULL)->where('isactive', 1)->with(['userdetails', 'jobskills.info'])->latest('jobposts.id');
        if($request->level){
            $query->where('level', $request->level);
        }
        if($request->mode){
            $query->where('mode', $request->mode);
        }
        if($request->salary){
            $query->where('Salary', $request->salary);
        }
        if($request->type){
            $query->where('salarytype', $request->type);
        }
        if($request->exp1 && $request->exp2){
            $query->whereBetween('experience', [$request->exp1, $request->exp2]); 
        }
        if ($request->skill) {
            $skillIds = $request->skill; // Assuming $request->skills is already an array
            $query->join('jobpostsskills', 'jobposts.id', '=', 'jobpostsskills.jobid')
            ->whereIn('jobpostsskills.techonology_id', $skillIds) 
            ->select('jobposts.id', 'jobposts.*');
           
   
        }
       $data = $query->paginate(15);
        $hrUsers = User::where('role', 5)->select('email', 'id')->get();
        if ($request->ajax()) {
            // dd($page);
            return response()->json([
                'html' => view('jobpostlist', compact('data', 'hrUsers', 'page'))->render()
            ]);
        }
        $techonologies = Techonology::where('isactive', 1)->get();
        $appliedTechnologies = Appliedpost::
        orderBy('experience', 'desc')
        ->first();
     
            // $candidateslist = Employercandidate::select('id', 'firstname', 'email')->get();

            // dd($candidateslist);
            if(\Auth::user()->role === 4 || \Auth::user()->role === 5){
                $candidateslist = Employercandidate::where('Employerid', \Auth::user()->belongsto)->select('id', 'firstname', 'email')->get();
           }else{
               $candidateslist = Employercandidate::where('Employerid', \Auth::user()->id)->select('id', 'firstname', 'email')->get();
           }
  
        return view('Employee.jobdata',compact('hrUsers', 'data', 'page', 'techonologies','appliedTechnologies','candidateslist'));

        // new code

        $user=User::where('email','=', \Auth::user()->email)->first();
        if (!$userToken=\JWTAuth::fromUser($user)) {
        return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return view('redirect')->with('userToken', $userToken);
        return redirect()->away('http://localhost:3000/?token=' . $userToken)->with('target', '_blank');

        // end of new code

        $techonologies = Techonology::select('techonology', 'id')->get();
        if(\Auth::user()->role === 4 || \Auth::user()->role === 5){
             $candidateslist = Employercandidate::where('Employerid', \Auth::user()->belongsto)->select('id', 'firstname', 'email')->get();
        }else{
            $candidateslist = Employercandidate::where('Employerid', \Auth::user()->id)->select('id', 'firstname', 'email')->get();
        }
        if(isset($request->tech)){
            $list = \DB::table('jobpostsskills')->whereIn('techonology_id', $request->tech)->distinct()->pluck('jobid');
            $Posts = Jobpost::with(['jobskills.info', 'appliedinfo'])->where('isactive', 1)->whereIn('id', $list)->whereNull('is_closed')->latest('id')->distinct()->paginate(10);
        }
        else{
            $Posts = Jobpost::with(['jobskills.info', 'appliedinfo'])->where('isactive', 1)->whereNull('is_closed')->latest('id')->paginate(10);
        }
        if ($request->ajax()) {
            $view = view('Employee/paginatedashboardapply',compact('Posts'))->render();
            return response()->json(['html'=>$view]);
        }
        // dd(111);
        return view('Employee/Dashboard2', compact('Posts', 'techonologies', 'candidateslist'));
    }

    public function jobappliedlist(Request $request){

        if(\Auth::user()->role === 4 || \Auth::user()->role === 5){
            $candidateslist = Employercandidate::where('Employerid', \Auth::user()->belongsto)->with(['getAppliedlist' => function ($query) use ($request) {
                $query->where('jobid', $request->id);
            }])->select('id', 'firstname', 'email')->select('id', 'firstname', 'email')->get();
       }else{
           $candidateslist = Employercandidate::where('Employerid', \Auth::user()->id)->with(['getAppliedlist' => function ($query) use ($request) {
            $query->where('jobid', $request->id);
        }])->select('id', 'firstname', 'email')->select('id', 'firstname', 'email')->get();
       }

            return response()->json([
                'success' => true,
                'data' => $candidateslist
            
            ]);

        // $sql = Jobsapplied::with('getAppliedlist')->where('jobid',$request->id)->get();
        // dd($sql);
    }
    public function applyCandidateJob(Request $request)
    {
        // dd($request->all());

  
                    try {
                    foreach($request->candidates as $candidate) {
                        // Check if the record already exists
                        $exists = Jobsapplied::where('user_id', $candidate)
                                            ->where('jobid', $request->jobid)
                                            ->exists();

                        if (!$exists) {
                            // Insert only if the combination does not exist
                            $applyJob = new Jobsapplied;
                            $applyJob->user_id = $candidate;
                            $applyJob->jobid = $request->jobid;
                            $applyJob->applied_by = 2;
                            $applyJob->is_employer_appied = 1;
                            $applyJob->isactive = 1;
                            $applyJob->save();
                        }
                    }

                    return response()->json([
                        'success' => true,
                        'message' => 'Job applied successfully!'
                    ]);

                } catch (\Exception $e) {
                    // Log the error for debugging
                    \Log::error($e);

                    return response()->json([
                        'success' => false,
                        'message' => 'An error occurred: ' . $e->getMessage()
                    ], 500); // 500 is the HTTP status code for internal server error   
                }

    }
 
}
