<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Auth;
use App\Models\Jobpost;
use App\Models\Jobpostsskill;
use App\Models\Employercandidate;
use App\Models\Techonology;
use Mail;
use App\Models\User;
use App\Models\Candidateskill;

trait EmployerTrait {
    public function CreateNewPost($data)
    {
      
        if(\Auth::user()->role == 4 || \Auth::user()->role == 5)
        {
            $data['employer_id'] = Auth::user()->belongsto;
        }else{
            $data['employer_id'] = Auth::user()->id;
        }
        $data['createdby'] = \Auth::user()->id;
        $newjob = Jobpost::create($data);
        // foreach($data['skill'] as $index => $sk){
        //     $checkExists = Techonology::where('techonology', $sk)->first();
        //     if(!$checkExists){
        //         $exp = $data['exp'][$index];
        //         $createNewTechonology = $this->NewTechonology($sk, $newjob, $exp);
        //     }else{
        //         $exp = $data['exp'][$index];
        //         $UpdateSkill = new Jobpostsskill;
        //         $UpdateSkill->jobid = $newjob->id;
        //         $UpdateSkill->techonology_id = $checkExists->id;
        //         $UpdateSkill->experience_required = $exp;
        //         $UpdateSkill->save();
        //     }
        // }
        if($newjob)
        {
            foreach($data['enteredskill'] as $in => $skill)
            {
                if($in != 0){
                    $exp = $data['enteredskillexp'][$in];
                    $UpdateSkill = new Jobpostsskill;
                    $UpdateSkill->jobid = $newjob->id;
                    $UpdateSkill->techonology_id = $skill;
                    $UpdateSkill->experience_required = $exp;
                    $UpdateSkill->save();
                    if(! $UpdateSkill)
                    {
                        return 0;
                    }
                }
            }
            //  $this->email($data);
            //dd(1111);
            return 1;
        }
        return 0;
    }
    public function getprticularjobdetails($data)
    {
        return Jobpost::with('jobskills.info')->where('id', $data['id'])->where('employer_id', Auth::user()->id)->first();
    }
    public function PostNewCandidate($data)
    {
        try{
            $newCandidate = new Employercandidate;
            $newCandidate->firstname = $data['fname'];
            $newCandidate->middlename = $data['mname'];
            $newCandidate->lastname = $data['lname'];
            $newCandidate->contactnumber = $data['contactnumber'];
            $newCandidate->email = $data['email'];
            $newCandidate->countrycode = $data['countrycode'];
            $newCandidate->location = $data['location'];
            $newCandidate->authorization = $data['authorization'];
            $newCandidate->title = $data['title'];
            $newCandidate->expectedate = $data['expectedrate'];
            $newCandidate->salarytype = $data['salarytype'];
            $newCandidate->education = $data['education'];
            $newCandidate->employee = $data['employee'];
            $newCandidate->relocate = $data['relocate'];
            $newCandidate->travel = $data['travel'];
            $newCandidate->experience = $data['experience'];
            $newCandidate->linked = $data['linked'];
            $newCandidate->contactemail  = $data['contactemail'];
            $newCandidate->createdby = \Auth::user()->id;
            $newCandidate->avaliabledate = $data['avaliabledate'];
            if(\Auth::user()->role === 4 || \Auth::user()->role === 5){
                $newCandidate->Employerid = Auth::user()->belongsto;
            }else{
                $newCandidate->Employerid = Auth::user()->id;
            }
            $newCandidate->save();
            foreach($data['skills'] as $skill)
            {
                $skilldata = explode("&&",$skill);
                $skillId = \DB::table('techonologies')->where('techonology', $skilldata[0])->pluck('id')->first();
                if($skillId == null){
                    $createTech = new Techonology;
                    $createTech->techonology = $skilldata[0];
                    $createTech->isactive = 1;
                    $createTech->save();
                    $skillId = $createTech->id;
                }
                $Skillsinfo = new Candidateskill;
                $Skillsinfo->skill = $skillId;
                $Skillsinfo->experience = $skilldata[1];
                $Skillsinfo->candId = $newCandidate->id;
                $Skillsinfo->isactive = 1;
                $Skillsinfo->save();
            }
            

            return response()->json([
                'success' => true,
                'message' => 'Data Inserted Sucessfully',
                'status' => 1
                ]);
        }catch(\Exception $error)
        {
            dd($error);
            return response()->json([
                'success' => false,
                'message' => 'Something Went Wrong',
                'status' => 0
            ]);
        }
    }
    public function updateCandidateDetails($data){
        try{
            $updateCandidate = Employercandidate::where('id', $data['id'])->update([
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
                'contactnumber' => $data['contactnumber'],
                'email' => $data['email'],
                'countrycode' => $data['countrycode'],
                'location' => $data['location'],
                'authorization' => $data['authorization'],
                'title' => $data['title'],
                'expectedate' => $data['expectedrate'],
                'salarytype' => $data['salarytype'],
                'education' => $data['education'],
                'employee' => $data['employee'],
                'relocate' => $data['relocate'],
                'travel' => $data['travel'],
                'experience' => $data['experience'],
                'linked' => $data['linked'],
                'contactemail'  => $data['contactemail'],
                'is_closed' => $data['closestatus'] ?? 0,
                'isactive' => $data['status']
            ]);
            if(isset($data['skills'])){
                foreach($data['skills'] as $skill)
                {
                    $skilldata = explode("&&",$skill);
                    $skillId = \DB::table('techonologies')->where('techonology', $skilldata[0])->pluck('id')->first();
                    if($skillId == null){
                        $createTech = new Techonology;
                        $createTech->techonology = $skilldata[0];
                        $createTech->isactive = 1;
                        $createTech->save();
                        $skillId = $createTech->id;
                    }
                    $Skillsinfo = new Candidateskill;
                    $Skillsinfo->skill = $skillId;
                    $Skillsinfo->experience = $skilldata[1];
                    $Skillsinfo->candId = $data['id'];
                    $Skillsinfo->isactive = 1;
                    $Skillsinfo->save();
                }
            }
                return response()->json([
                    'success' => true,
                    'message' => 'Data Inserted Sucessfully',
                    'status' => 1
                    ]);
        }catch(\Exception $e){
            dd($e);
        }
        
    }
    public function UpdatePostinfo($data)
    {
        // dd($data);
        
        $newjob = Jobpost::where('id', $data['id'])->update([
            'role' => $data['role'],
            'description' => $data['description'],
            'experience' => $data['experience'],
            'level' => $data['level'],
            'location' => $data['location'],
            'mode' => $data['mode'],
            'noofposts' => $data['noofposts'],
            'enddate' => $data['enddate'],
            'salarytype' => $data['salarytype'],
            'clientname' => $data['clientname'],
            'duration' => $data['duration'],
            'startdate' => $data['startdate'],
            'Salary' => $data['Salary'],
            'jobs_filled' => $data['close'],
            'is_closed' => $data['close'] ? 1 : NULL,
            'isactive' => $data['status'],
            'type' => $data['type'],
            'number' => $data['number'],
            'contactemail' => $data['contactemail'],
            'recruiter' => $data['recruiter'],
        ]);
        // dd($data['skill']);
        // foreach($data['skill'] as $sk){
            
        //     $checkExists = Techonology::where('techonology', $sk)->first();
        //     // dd($checkExists);
        //     if(!$checkExists){
        //         // dd('entered');
        //         $createNewTechonology = $this->NewTechonology($sk, $data['id']);
        //         // dd($createNewTechonology);
        //     }else{
        //         // dd('notentered');
        //         $UpdateSkill = new Jobpostsskill;
        //         $UpdateSkill->jobid = $data['id'];
        //         $UpdateSkill->techonology_id = $checkExists->id;
        //         $UpdateSkill->save();
        //         // dd($UpdateSkill);
        //     }
        // }
        if(isset($data['skils'])){
            foreach($data['skils'] as $skill)
            {
                $UpdateSkill = new Jobpostsskill;
                $UpdateSkill->jobid = $data['id'];
                $UpdateSkill->techonology_id = (int)$skill;
                $UpdateSkill->save();
            }
        }
        return 1;
        // return 0;
    }
    public function NewTechonology($data, $id, $exp)
    {
        // dd($id);
        try{
            $create = new Techonology;
            $create->techonology = $data;
            $create->isactive = 1;
            $create->save();
            $UpdateSkill = new Jobpostsskill;
            $UpdateSkill->jobid = $id;
            $UpdateSkill->techonology_id = $create->id;
            $UpdateSkill->experience_required = $exp;
            $UpdateSkill->save();
            // dd('created');
            return 1;
        }catch(\Exception $e){
            // dd($e);
            return 0;
        }
    }
    public function email($data)
    {
    
        if(\Auth::user()->role == 2){
            $emailsToSend = User::where('belongsto', \Auth::user()->id)->orWhere('id',  \Auth::user()->id)->pluck('email');
        }else{
            dd(111);
        }
            foreach($emailsToSend as $emailToSend){
                Mail::send(['html'=>'mails/createpost'], $data, function($message) use($emailToSend) {
                 $message->to($emailToSend, 'New Job Created')->subject
                    ('Job Post');
                 $message->from('venkat.t@softhouz.com','Job portal');
            });
        }
        return 1;
        
    }
}