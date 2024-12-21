<?php

namespace App\Http\Controllers\Employee;
use App\Http\Traits\EmployeeRegistrationTrait;
use App\Traits\EmailTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchaseplan;
use Smalot\PdfParser\Parser;
use App\Models\Jobpost;
use Auth;
use App\Models\Employercandidate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Employeeinfo;
use App\Models\purchaseplanscard;
use App\Models\Employeeskill;
use App\Models\countries;
use App\Models\state;
use Illuminate\Support\Facades\Session;

class EmployeeLoginController extends Controller
{
    use EmployeeRegistrationTrait;
    use EmailTrait;
    public function EmployeeeRegister()

    {       
        $countries = countries::orderBy('country_name', 'asc')->get();
        return view('Employee.EmployeeRegistration',compact('countries'));
    }
    public function getStatesByCountry(Request $request)

    {
       $countryId = $request->CountryId;

        $states = state::where('country_id',$countryId)->get();
        return response()->json(['states' => $states]);
    }
    public function validateMail(Request $request){
        $email = $request->Email;
        $findEmail = User::where('email', $email)->first();
        if($findEmail){
            return response()->json(['statusCode' => 500,'status' => 'failed']);
        }else{
            return response()->json(['statusCode' => 200,'status' => 'success']);
        }


    }
    public function EmployeeSumitRegistration(Request $request)
    {
        // $validation = $this->RegistrationValidation($request->all());
        $Register = $this->NewEmployeeRegister($request->all());
        // dd($Register);
        // $this->registrationConfirmationEmail($request->all());
        if($Register == 1)
        {
            $sucessinfo = 1;
            return redirect()->route('LoginRoute')->with('message', 'Registration Done You can Login Now!');
        }
    }
    public function LoginRoute()
    {
        // dd('dfsdfd');
        $sucessinfo = 1;
        return view('Employee/login', compact('sucessinfo'));
    }
    public function EmployeeLogin(Type $var = null)
    {
        $sucessinfo = 1;
        return view('Employee/loginform', compact('sucessinfo'));
    }
    public function EmployeeHome(Request $request)
    {
        // dd(Auth::user()->role);
        $this->LogoutOtherDevices();
        if(\Auth::user()->role === 2)
        {
            $PaymentDetails = Purchaseplan::where('user_id', \Auth::user()->id)->orderby('id', 'desc')->where('isactive', 1)->where('created_at', '>=', now()->subDays(365))->first();
            // dd($PaymentDetails);
            if($PaymentDetails)
            {
                $ActivePosts = Jobpost::where('employer_id', Auth::user()->id)->where('isactive', 1)->where('is_closed', NULL)->count();
                
                $AllPosts = Jobpost::where('employer_id', Auth::user()->id)->where('isactive', 1)->count();
                $InactivePosts = Jobpost::where('employer_id', Auth::user()->id)->where('isactive', 0)->count();
                $Candidates = Employercandidate::where('Employerid', Auth::user()->id)->where('isactive', 1)->count(); 
                $recentPosts = Jobpost::with('Techonology.info')->where('employer_id', Auth::user()->id)->where('isactive', 1)->paginate(5);
                $closedPosts = Jobpost::where('employer_id', Auth::user()->id)->where('is_closed', 1)->count();
               
                $CandidatesCount = Employercandidate::where('Employerid', Auth::user()->id)->count();
                $activeCandidates = Employercandidate::where('Employerid', Auth::user()->id)->where('isactive', 1)->where('is_closed', 0)->count();
                $inactiveCandidates = Employercandidate::where('Employerid', Auth::user()->id)->where('isactive', 0)->count();
                $closedCandidates = Employercandidate::where('Employerid', Auth::user()->id)->where('is_closed', 1)->count();
                $closedjobsCandidates = Jobpost::where('employer_id', Auth::user()->id)->sum('jobs_filled');
                $lastFiveCandidates = Employercandidate::where('Employerid', Auth::user()->id)->with(['addedskills'])->latest('id')->paginate(5); 
        
                return view('Employer/Dashboard', compact('ActivePosts', 'AllPosts', 'InactivePosts', 'Candidates', 'recentPosts', 'closedPosts', 'CandidatesCount', 'activeCandidates', 'inactiveCandidates', 'closedCandidates', 'closedjobsCandidates', 'lastFiveCandidates'));
            }else{
                $purchaseplanscards = purchaseplanscard::get();
                
                // dd($purchaseplanscards);
                return view('Employee/home',compact('purchaseplanscards'));
            }
        }elseif(\Auth::user()->role === 4 || \Auth::user()->role === 5)
        {
            
            $PaymentDetails = Purchaseplan::where('user_id', \Auth::user()->belongsto)->where('isexpiry', 0)->where('isactive', 1)->first();
            if($PaymentDetails)
            {

                $ActivePosts = Jobpost::where('employer_id', \Auth::user()->belongsto)->where('isactive', 1)->where('is_closed', NULL)->count();
                
                $AllPosts = Jobpost::where('employer_id', \Auth::user()->belongsto)->where('isactive', 1)->count();
                $InactivePosts = Jobpost::where('employer_id', \Auth::user()->belongsto)->where('isactive', 0)->count();
                $Candidates = Employercandidate::where('Employerid', \Auth::user()->belongsto)->where('isactive', 1)->count(); 
                $recentPosts = Jobpost::with('Techonology.info')->where('employer_id', \Auth::user()->belongsto)->where('isactive', 1)->paginate(5);
                $closedPosts = Jobpost::where('employer_id', \Auth::user()->belongsto)->where('is_closed', 1)->count();
               
                $CandidatesCount = Employercandidate::where('Employerid', \Auth::user()->belongsto)->count();
                $activeCandidates = Employercandidate::where('Employerid', \Auth::user()->belongsto)->where('isactive', 1)->where('is_closed', 0)->count();
                $inactiveCandidates = Employercandidate::where('Employerid', \Auth::user()->belongsto)->where('isactive', 0)->count();
                $closedCandidates = Employercandidate::where('Employerid', \Auth::user()->belongsto)->where('is_closed', 1)->count();
                $closedjobsCandidates = Jobpost::where('employer_id', \Auth::user()->belongsto)->sum('jobs_filled');
                $lastFiveCandidates = Employercandidate::where('Employerid', \Auth::user()->belongsto)->with(['addedskills'])->latest('id')->paginate(5); 
        
                return view('Employer/Dashboard', compact('ActivePosts', 'AllPosts', 'InactivePosts', 'Candidates', 'recentPosts', 'closedPosts', 'CandidatesCount', 'activeCandidates', 'inactiveCandidates', 'closedCandidates', 'closedjobsCandidates', 'lastFiveCandidates'));

            }else{
                return view('Employee/home');
            }
        }elseif(\Auth::user()->role === 3)
        {
             $techonologies  = \DB::table('techonologies')->where('isactive', 1)->get();
            $Posts = Jobpost::with(['jobskills.info', 'appliedinfo'])->where('isactive', 1)->latest('id')->paginate(10);
            if ($request->ajax()) {
                $view = view('Employee/paginatedashboard',compact('Posts'))->render();
                return response()->json(['html'=>$view]);
            }
            
            return view('Employee/Dashboard1', compact('Posts', 'techonologies'));
        }
        
        
    }
    public function test(Request $request)
    {
        $file = $request->fileToUpload;
        $fileName = $file->getClientOriginalName();

        $pdfParser = new Parser();
        dd(';asdasdasd');
        $pdf = $pdfParser->parseFile($file->path());
      
        $content = $pdf->getText();
        // dd($content);
    }
    public function EmployeeRegister()
    {
        $techoologies = \DB::table('techonologies')->where('isactive', 1)->get();
        return view('Employee/EmployeeRegister', compact('techoologies'));
    }
    public function EmployeeRegistrationsubmit(Request $request)
    {
        // dd($request->all());
        $RegisterEmployee = new User;
        $RegisterEmployee->name = $request->firstname;
        $RegisterEmployee->email  = $request->email;
        $RegisterEmployee->password = Hash::make($request->password);
        $RegisterEmployee->role = 3;
        $RegisterEmployee->isactive = 1;
        $RegisterEmployee->save();
        $Resume = time().'.'.$request->file->extension(); 
        $path = 'Employees/Resumes/' . date('y') . '/' . date('m');
        $request->file->move(public_path($path, $Resume));
        $employeeinfo = new Employeeinfo;
        $employeeinfo->lastname = $request->lastname;
        $employeeinfo->number = $request->number;
        $employeeinfo->middlename = $request->middlename;
        $employeeinfo->authorization = $request->authorization;
        $employeeinfo->ctc = $request->ctc;
        $employeeinfo->ectc = $request->ectc;
        $employeeinfo->relocate = $request->relocate;
        $employeeinfo->travel = $request->travel;
        $employeeinfo->experience = $request->experience;
        $employeeinfo->Location = $request->Location;
        $employeeinfo->resume = $Resume;
        $employeeinfo->user_id = $RegisterEmployee->id;
        $employeeinfo->isactive = 1;
        $employeeinfo->save();
        foreach($request->skils as $skill)
        {
            if($skill != null)
            {
                $employeesklls = new Employeeskill;
                $employeesklls->skillid = $skill;
                $employeesklls->employeeinfoid = $RegisterEmployee->id;
                $employeesklls->isactive = 1;
                $employeesklls->save();
            }
        }
        return redirect()->route('EmployeeLogin')->with('message', 'Employee Registration has been done!');
    }
    public function forgotpassword(){
        return view('passwords.forgotpassword');
    }
    public function resetpasswordmailcheck(Request $request){
        try{
            $checkEmail = User::where('email', $request->email)->pluck('email')->first();
            
           // dd($data);
            if($checkEmail != null){
                $data['otp'] = rand();
                $otpUpdate = User::where('email', $checkEmail)->update(['otp' => $data['otp']]);
                \Mail::send(['html'=>'mails.forgotpassword'], $data, function($message) use($checkEmail) {
                    $message->to($checkEmail, 'Job Portal')->subject
                        ('Forgot password');
                    $message->from('venkat.t@softhouz.com','admin');
                });
                 return response()->json([
                    'success' => true,
                    'message' => 'Email sent'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Email not found'
            ]);
        }catch(\Exception $e){
          //  dd($e);
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);
        }
    }
    public function resetpasswordotpverify(Request $request){
        try{
            $checkOtp = User::where('email', $request->email)->pluck('otp')->first();
            if($checkOtp == $request->otpentered){
                return response()->json([
                    'success' => true,
                    'message' => 'otp verified'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'invalid otp'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);
        }
    }
    public function resetpasswordchange(Request $request){
        try{
            $checkEmail = User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
            ]);
             return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);
        }
    }
    public function changepasswordadmin(Request $request){
        try{
            $updatePasswordByAdmin = User::where('id', $request->selectedid)->update([
                'password' => Hash::make($request->newpassword),    
            ]);
            return response()->json([
                'success' => true
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function LogoutOtherDevices()
    {
        if(Session::get('password_temp')){
            $currentUserId = Auth::id();
            Session::getHandler()->destroy($currentUserId);
            Auth::logoutOtherDevices(Session::get('password_temp'));
            session()->forget('password_temp');
        }
    }
}
