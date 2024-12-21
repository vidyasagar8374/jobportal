<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobpost;
use Auth;
use App\Models\Jobsapplied;

class JobApplicationController extends Controller
{
    public function Jobslisting ()
    {
        $jobPosts = Jobpost::where('isactive', 1)->Orderby('id', 'desc')->paginate(20);
        return view('Employee/Dashboard', compact('jobPosts'));
    }
    public function ApplyJob(Request $request)
    {
        // \Artisan::call('optimize');
         //   dd(111);
        try{
           
            $Apply = new Jobsapplied;
            $Apply->user_id = Auth::user()->id;
            $Apply->jobid = $request->jobid;
            $Apply->isactive = 1;
            $Apply->type = 1;
            $Apply->save();
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e)
        {
            return response()->json([
                'success' => false
            ]);
        }
        
    }
 
    public function removeApplyJob(Request $request)
    {
        try{
            $Apply = Jobsapplied::where('jobid', $request->jobid)->where('user_id', Auth::user()->id)->delete();
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e)
        {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function test()
    {
        return 5;
    }

    
}
