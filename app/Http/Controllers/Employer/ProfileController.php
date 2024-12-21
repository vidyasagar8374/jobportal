<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Employeedetail;

class ProfileController extends Controller
{
    public function Employerprofile(Request $request)
    {
        $employerDetails = User::with(['EmployerInfo'])->where('id', Auth::user()->id)->first();
        return view('Employer/profile', compact('employerDetails'));
    }
    public function editprofile(Request $request)
    {
        try{
            $editProfile = Employeedetail::where('user_id', Auth::user()->id)->update([
                'companyname' => $request->companyname,
                'number' => $request->mobile,
                'companyemail' => $request->companymail,
                'companycity' => $request->companycity,
                'companystate' => $request->companystate,
                'companynumber' => $request->companynumber,
                'companywebsite' => $request->companywebsite,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Profile Details Updated Sucessfully',
                'status' => 1
            ]);
        }catch(\Exception $error)
        {
            return response()->json([
                'success' => false,
                'message' => 'Something Went Wrong',
                'status' => 0
            ]);
        }
    }
}
