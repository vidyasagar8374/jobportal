<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function login(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isactive' => 1])) {
        
    //         // Log out other user if already logged in
    //         $this->logoutOtherUsers();
    
    //         // Redirect the user after login
    //         return redirect('/EmployeeHome');
    //     }
    // }
//     private function logoutOtherUsers()
// {
//     // Get the ID of the currently logged-in user
//     $currentUserId = Auth::id();

//     // Invalidate the session for other users with the same user ID
//     Session::getHandler()->destroy($currentUserId);

//     // Log out other users with the same user ID
//     Auth::logoutOtherDevices(request('password'));
// }
    protected function credentials(Request $request)
    {
        Session::put('password_temp', request()->password);
        // dd(111111111);
        return [
            'email' => request()->email,
            'password' => request()->password,
            'isactive' => 1
        ];
    }
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }
    public function __destruct() {

    }
    public function sendFailedLoginResponse(Request $request)
    {
       
		$useremail = \DB::table('users')->where('email', $request->email)->first();
      	if(!$useremail){
          throw ValidationException::withMessages([
              $this->username() => 'email not found',
          ]);
        }
      	if($useremail && ! Hash::check($request->password, $useremail->password)){
            
         	return redirect()->back()->withErrors(['password' => 'Wrong password entered'])->withInput($request->except('password'));
        }
        if($useremail->isactive != 1){
            
            throw ValidationException::withMessages([
                $this->username() => 'User InActivated by admin',
            ]);
       }


    }
}
