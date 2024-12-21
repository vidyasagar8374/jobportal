<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobpost;
use App\Models\Jobpostsskill;
use App\Models\Jobsapplied;

class JobsApplicationController extends Controller
{
    public function techonologies(){
        $list = \DB::table('techonologies')->where('isactive', 1)->get();
        return response()->json([
            'success' => true,
            'data' => $list
        ]);
    }
    public function openjobs(Request $request){
        \Log::info($request->all());
        $experience = $request->experience;
        $jobId = $request->jobId;
        $salary = '';
        // if(isset($request->salary) && ($request->salary[0] != 0 || $request->salary[1] != 0)){
            $salary = $request->salary;
        // }
        $selectedOptions = $request->selectedOptions;
        $filters = $request->checkboxes;
        // return $jobId;
        $jobs = Jobpost::with(['jobskills.info'])->where('isactive', 1)->where('is_closed', NULL)
        ->when(isset($jobId), function ($query) use ($jobId) {
            return $query->where('id', $jobId);
        })
        ->when(isset($experience) && ($request->experience[0] != 0 || $request->experience[1] != 0), function ($query) use ($experience) {
            return $query->whereBetween('experience', $experience);
        })
        ->when(isset($salary) && ($request->salary[0] != 0 || $request->salary[1] != 0), function ($query) use ($salary) {
            return $query->whereBetween('Salary', $salary);
        })
        ->when(isset($filters['hybrid']) && $filters['hybrid'], function ($query) {
            return $query->where('mode', 2);
        })
        ->when(isset($filters['remote']) && $filters['remote'], function ($query) {
            return $query->where('mode', 1);
        })
        ->when(isset($filters['workfromoffice']) && $filters['workfromoffice'], function ($query) {
            return $query->where('mode', 3);
        })
        // if (isset($filters['hybrid']) && $filters['hybrid']) {
        //     $query->where('mode', 2);
        // }
        
        // if (isset($filters['remote']) && $filters['remote']) {
        //     $query->where('mode', 1);
        // }
        // if (isset($filters['workfromoffice']) && $filters['workfromoffice']) {
        //     $query->where('mode', 3);
        // }
        ->latest('id')->paginate(20);
        return response()->json([
            'success' => true,
            'data' => $jobs
        ]);
    }
    public function jobdetails($id){
        $jobs = Jobpost::with(['jobskills.info'])->where('id', $id)->first();
        return response()->json([
            'success' => true,
            'data' => $jobs
        ]);
    }
    public function applyjobapi(Request $request){
        // dd($request->all());
        try{
            foreach($request->employees as $employee){
                $Apply = new Jobsapplied;
                $Apply->user_id = $employee['id'];
                $Apply->applied_by = 2;
                $Apply->is_employer_appied = 1;
                $Apply->jobid = $request['jobid'];
                $Apply->isactive = 1;
                $Apply->type = 1;
                $Apply->save();
            }
            
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e){
            \Log::error($e);
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function employercandidates(){
        $data = \DB::table('employercandidates')->where('Employerid', 125)->where('isactive',1)->where('is_closed', 0)->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    public function testapi(){
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }
}
