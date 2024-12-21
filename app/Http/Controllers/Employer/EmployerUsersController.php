<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchaseplan;
use App\Traits\EmailTrait;

class EmployerUsersController extends Controller
{
    use EmailTrait;

    public function EmployerUsers(Request $request)
    {
        $users = User::where('belongsto', \Auth::user()->id)->get();
        $CheckPlanDetails = Purchaseplan::with(['plandetails'])->where('user_id', \Auth::user()->id)->where('isexpiry', 0)->orderBy('id', 'desc')->first();
        //  dd($CheckPlanDetails);
        if(!$CheckPlanDetails)
        {
            return redirect('EmployeeHome');
        }
        return view('Employer/EmployerUserDetails', compact('users', 'CheckPlanDetails'));
    }
    public function EmployerUserCreate(Request $request)
    {
        return view('Employer/CreateUserView');
    }
    public function CreateNewUser(Request $request)
    {
        // try{
            $NewUser = new User;
            $NewUser->email = $request->email;
            $NewUser->password = \Hash::make($request->password);
            $NewUser->role = $request->role;
            $NewUser->name = $request->username;
            $NewUser->mobile = $request->mobile;
            $NewUser->isactive = 1;
            $NewUser->belongsto = \Auth::user()->id;
            $NewUser->issub = 1;
            $NewUser->save();
            // $emailType = 'team register';
            // $this->sendEmail($emailType, $request->all());
            return response()->json([
                'success' => true,
            ]);
        // }catch(\Exception $e)
        // {
        //     dd($e);
        //     return response()->json([
        //         'success' => false,
        //     ]);
        // }
    }
    public function activeuser(Request $request)
    {
        try{
            $inactive = User::where('id', $request->id)->where('belongsto', \Auth::user()->id)->update([
                'isactive' => 1,
            ]);
            if($inactive)
            {
                return 1;
            }
            return 0;
        }catch(\Exception $e)
        {
            return 0;
        }
    }
    public function inactiveuser(Request $request)
    {
        try{
            $inactive = User::where('id', $request->id)->where('belongsto', \Auth::user()->id)->update([
                'isactive' => 0,
            ]);
            if($inactive)
            {
                return 1;
            }
            return 0;
        }catch(\Exception $e)
        {
            return 0;
        }
    }
}
