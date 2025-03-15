<?php

namespace App\Http\Controllers\Employer;
use App\Traits\EmployerTrait;
use App\Traits\EmailTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Techonology;
use App\Models\Jobpost;
use App\Models\Appliedpost;
use Auth;
use DataTables;
use App\Models\Country;
use App\Models\Employercandidate;
use Session;
use App\Models\User;
use App\Models\Jobsapplied;


class EmployerController extends Controller
{
    use EmployerTrait;
    use EmailTrait;
    public function EmployeerCreatePost()
    {
        // dd(111);
        // return view('mails/createpost');
        $userinfo = \Auth::user()->id;
        if(\Auth::user()->role == 5){
            $userinfo = \Auth::user()->belongsto;
        }
        $techonologies = Techonology::where('isactive', 1)->get();
        $recuriterinfo = User::where(function ($query){
            $query->where('isactive', 1);
        })->where(function ($query) use($userinfo){
            $query->where('belongsto', $userinfo)
                    ->orwhere('id', $userinfo);
        })->get();
        return view('Employer/Createpost', compact('techonologies', 'recuriterinfo'));
    }
    public function Createpost(Request $request)
    {
        // dd($request->all());
        $newpost = $this->CreateNewPost($request->all());
        // $this->newpostConfirmation();
        if($newpost)
        {
            return 1;
        }
        return 0;
    }
    public function Updatepost(Request $request)
    {
        $newpost = $this->UpdatePostinfo($request->all());
        if($newpost)
        {
            return 1;
        }
        return 0;
    }
    public function viewposts(Request $request)
    {
        $page = 'all';
        $userinfo = \Auth::user()->id;
        if(\Auth::user()->role == 5){
            $userinfo = \Auth::user()->belongsto;
        }
        // 

        $query = Jobpost::where('is_closed', NULL)->where('employer_id', $userinfo)->where('isactive', 1)->with(['userdetails', 'jobskills.info'])->latest('jobposts.id');
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
        $hrUsers = User::where('belongsto', $userinfo)->where('role', 5)->select('email', 'id')->get();
        if ($request->ajax()) {
            return response()->json([
                'html' => view('posts', compact('data', 'hrUsers', 'page'))->render()
            ]);
        }
        $techonologies = Techonology::where('isactive', 1)->get();
        $appliedTechnologies = Appliedpost::
        orderBy('experience', 'desc')
        ->where('employer_id', $userinfo)
        ->first();
        return view('Employer.Viewjobposts', compact('hrUsers', 'data', 'page', 'techonologies','appliedTechnologies'));
    }
    public function viewpostsclosed(Request $request)
    {
        $page = 'closed';
        $userinfo = \Auth::user()->id;
        if(\Auth::user()->role == 5){
            $userinfo = \Auth::user()->belongsto;
        }
        // 
        $query = Jobpost::where('is_closed', 1)->where('employer_id', $userinfo)->with(['userdetails', 'jobskills.info'])->latest('jobposts.id');

        // $query = Jobpost::where('is_closed', NULL)->where('isactive', 1)->with(['userdetails', 'jobskills.info'])->latest('jobposts.id');
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
        // dd($data);
        $hrUsers = User::where('belongsto', $userinfo)->where('role', 5)->select('email', 'id')->get();
        if ($request->ajax()) {
            return response()->json([
                'html' => view('posts', compact('data', 'hrUsers', 'page'))->render()
            ]);
        }
        $techonologies = Techonology::where('isactive', 1)->get();
        $appliedTechnologies = Appliedpost::
        orderBy('experience', 'desc')
        ->where('employer_id', $userinfo)
        ->first();
        return view('Employer/Viewjobposts', compact('hrUsers', 'data', 'page', 'techonologies','appliedTechnologies'));
    }
    public function viewpostsinactive(Request $request)
    {
        $page = 'inactive';
        $userinfo = \Auth::user()->id;
        if(\Auth::user()->role == 5){
            $userinfo = \Auth::user()->belongsto;
        }
        $query = Jobpost::where('isactive', 0)->where('employer_id', $userinfo)->with(['userdetails', 'jobskills.info'])->latest('jobposts.id');

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
        // where('employer_id', $userinfo)->where
        $hrUsers = User::where('belongsto', $userinfo)->where('role', 5)->select('email', 'id')->get();
        if ($request->ajax()) {
            return response()->json([
                'html' => view('posts', compact('data', 'hrUsers', 'page'))->render()
            ]);
        }
        $techonologies = Techonology::where('isactive', 1)->get();
        $appliedTechnologies = Appliedpost::
        orderBy('experience', 'desc')
        ->where('employer_id', $userinfo)
        ->first();
        return view('Employer/Viewjobposts', compact('hrUsers', 'data', 'page', 'techonologies','appliedTechnologies'));
    }
    public function viewpostsinfo(Request $request)
    {
        $userinfo = \Auth::user()->id;
        if(\Auth::user()->role == 5){
            $userinfo = \Auth::user()->belongsto;
        }
        // if($request->search){
        //      $data = $this->SearchData($request->search, $request->user, $request->id, $userinfo);
        //      return $data;
        // }
        $data = Jobpost::where('employer_id', $userinfo)->with(['userdetails'])->latest('id')->get();

        // if($request->user){
        //     if($request->id == 1){
        //         $data = Jobpost::where('employer_id', $userinfo)->where('recruiter', $request->user)->with(['userdetails']);
        //     }elseif($request->id == 2){
        //         $data = Jobpost::where('employer_id', $userinfo)->where('isactive', 1)->where('recruiter', $request->user)->with(['userdetails']);
        //     }else if($request->id == 3){
        //         $data = Jobpost::where('employer_id', $userinfo)->where('isactive', 0)->where('recruiter', $request->user)->with(['userdetails']);
        //     }
        // }else{
        //     if($request->id == 1){
        //         $data = Jobpost::where('employer_id', $userinfo)->with(['userdetails']);
        //     }elseif($request->id == 2){
        //         $data = Jobpost::where('employer_id', $userinfo)->with(['userdetails'])->where('isactive', 1);
        //     }else if($request->id == 3){
        //         $data = Jobpost::where('employer_id', $userinfo)->with(['userdetails'])->where('isactive', 0);
        //     }
        // }
        // $data = $data->latest('id')->paginate(50);
        // if(!Session::has('posts'))
        // {
        //     $data = Jobpost::where('employer_id', Auth::user()->id)->paginate(5);
        // }else if(Session::get('posts') == 'All'){
        //     $data = Jobpost::where('employer_id', Auth::user()->id)->paginate(5);
        // }else if(Session::get('posts') == 'Active'){
        //     $data = Jobpost::where('employer_id', Auth::user()->id)->where('isactive', 1)->paginate(5);
        // }else if(Session::get('posts') == 'Inactive'){
        //     $data = Jobpost::where('employer_id', Auth::user()->id)->where('isactive', 0)->paginate(5);
        // }
        // $data = Jobpost::where('employer_id', Auth::user()->id)->paginate(5);
        // return $data;
    }
    // public function viewposts(Request $request)
    // {
    //     if ($request->ajax()) {
    //         if(\Auth::user()->role == 4 || \Auth::user()->role == 5)
    //         {
    //             $data = Jobpost::where('employer_id', Auth::user()->belongsto)->select('*');
    //         }else{
    //             $data = Jobpost::where('employer_id', Auth::user()->id)->select('*');
    //         }
    //         return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('status', function($row){
    //                      if($row->isactive == 1){
    //                         return '<span class="badge badge-primary">Active</span>';
    //                      }else{
    //                         return '<span class="badge badge-danger">Deactive</span>';
    //                      }
    //                 })
    //                 ->filter(function ($instance) use ($request) {
    //                     if ($request->get('isactive') == '0' || $request->get('isactive') == '1') {
    //                         $instance->where('isactive', $request->get('isactive'));
    //                     }
    //                     if (!empty($request->get('search'))) {
    //                          $instance->where(function($w) use($request){
    //                             $search = $request->get('search');
    //                             $w->orWhere('id', 'LIKE', "%$search%")
    //                             ->orWhere('role', 'LIKE', "%$search%");
    //                         });
    //                     }
    //                 })
    //                 ->rawColumns(['status'])
    //                 ->make(true);
    //     }
        
    //     return view('Employer/Viewjobposts');
    // }
    public function addcandidate(Request $request)
    {
        $countries = Country::get();
        $employetypes = \DB::table('employee_type')->where('is_active', 1)->get();
        $workAuthorizations = \DB::table('employer_work_authorization')->where('is_active', 1)->get();
        return view('Employer/Addcandidate', compact('countries', 'employetypes', 'workAuthorizations'));
    }
    public function getjobdetails(Request $request)
    {
        return $this->getprticularjobdetails($request->all());
    }
    public function postcandidate(Request $request)
    {
        try{
            return $this->PostNewCandidate($request->all());
        }catch(\Exception $error)
        {
            return response()->json([
                'success' => false,
                'message' => 'Something Went Wrong'
                ]);
        }
        
    }
    public function updatecandidate(Request $request){
        try{
            return $this->updateCandidateDetails($request->all());
        }catch(\Exception $error)
        {
            return response()->json([
                'success' => false,
                'message' => 'Something Went Wrong'
                ]);
        }
    }
    public function addedcandidatelist(Request $request)
    {
        try
        {
            $page = 'all';
            if(\Auth::user()->role === 4 || \Auth::user()->role === 5)
            {
                // where('Employerid', Auth::user()->belongsto)->
                $data = Employercandidate::where('Employerid', Auth::user()->belongsto)->with(['addedskills.skilldetails'])->where('isactive', 1)->where('is_closed', 0)->paginate(15);
            }else{
                // where('Employerid', Auth::user()->id)->
                $data = Employercandidate::where('Employerid', Auth::user()->id)->with(['addedskills.skilldetails'])->where('isactive', 1)->where('is_closed', 0)->paginate(15);
            }
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('Employer.candidate', compact('data', 'page'))->render()
                ]);
            }
            return view('Employer.addedcandidatelist', compact('data', 'page'));
            // if($request->ajax()) {
            //     if(\Auth::user()->role === 4 || \Auth::user()->role === 5)
            //     {
            //         $data = Employercandidate::where('Employerid', Auth::user()->belongsto)->where('isactive', 1)->get();
            //     }else{
            //         $data = Employercandidate::where('Employerid', Auth::user()->id)->where('isactive', 1)->get();
            //     }
            //     return Datatables::of($data)
                
            //         ->addIndexColumn()
                    
            //         ->addColumn('action', function($row){
            //         //     $actionBtn = '<button  onclick="candidatedetails(' . $row->id . ')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            //         //     View
            //         //   </button>';
            //           $actionBtn = '<svg xmlns="http://www.w3.org/2000/svg" data-toggle="modal" data-target="#exampleModalLong" onclick="candidatedetails(' . $row->id . ')"  height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>';
            //           $actionBtn = $actionBtn . '' ;
            //             return $actionBtn;
            //         })
            //         ->editColumn('relocate', '@if($relocate == 1) Yes @elseif(isset($status) && $status  == 0) No @else No @endif')
            //         ->rawColumns(['action'])
            //         ->make(true);
            // }
            // return view('Employer/addedcandidatelist');
        }catch(\Exception $error)
        {
            dd($error);
        }
    }
    public function viewcandidateApplications(Request $request, $id = ""){
        if ($request->ajax()) {
            $id = $request->id;
            $data = Jobsapplied::where('user_id', $id)->with(['postdetails.jobskills.info'])->paginate(15);
            return response()->json([
                'html' => view('Employer.jobsapplicants', compact('data', 'id'))->render()
            ]);
        }
        $data = Jobsapplied::where('user_id', $id)->with(['postdetails.jobskills.info'])->paginate(15);
        return view('Employer.appliedjobs', compact('data', 'id'));
    }
    public function inactivecandidatelist(){
       
        if(\Auth::user()->role === 4 || \Auth::user()->role === 5)
        {
            $data = Employercandidate::where('Employerid', Auth::user()->belongsto)->with(['addedskills.skilldetails'])->where('isactive', 0)->paginate(15);
        }else{
            $data = Employercandidate::where('Employerid', Auth::user()->id)->with(['addedskills.skilldetails'])->where('isactive', 0)->paginate(15);
        }
        return view('Employer/addedcandidatelist', compact('data'));
    }
    public function closecandidatelist(){
        if(\Auth::user()->role === 4 || \Auth::user()->role === 5)
        {
            $data = Employercandidate::where('Employerid', Auth::user()->belongsto)->with(['addedskills.skilldetails'])->where('is_closed', 1)->get();
        }else{
            $data = Employercandidate::where('Employerid', Auth::user()->id)->with(['addedskills.skilldetails'])->where('is_closed', 1)->get();
        }
        return view('Employer/addedcandidatelist', compact('data'));
    }
    public function searchData($searchInput, $user, $id, $userinfo)
    {
        return Jobpost::with(['userdetails'])->where(function ($query) use($userinfo) {
                $query->where('employer_id', '=', $userinfo);
            })
            ->where(function ($query) use($searchInput) {
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
            })->get();
    }
    public function employercandidate($id){
        $data = Employercandidate::where('id', $id)->with(['addedskills.skilldetails'])->first();
        $countries = Country::get();
        $employetypes = \DB::table('employee_type')->where('is_active', 1)->get();
        $workAuthorizations = \DB::table('employer_work_authorization')->where('is_active', 1)->get();
        return view('Employer.candidateedit', compact('countries', 'employetypes', 'workAuthorizations', 'data'));
    }
}
