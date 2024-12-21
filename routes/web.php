<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeLoginController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Purchase\PaymentController;
use App\Http\Controllers\Jobposts\JobPostsController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Employee\JobApplicationController;
use App\Http\Controllers\Employee\JobsApplyController;
use App\Http\Controllers\Employer\EmployerUsersController;
use App\Http\Controllers\RaiseTicketController;
use App\Http\Controllers\Employer\SubscriptionController;
use App\Http\Controllers\Paypal\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//passwords

Route::get('/forgotpassword', [EmployeeLoginController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/resetpasswordmailcheck', [EmployeeLoginController::class, 'resetpasswordmailcheck'])->name('resetpasswordmailcheck');
Route::post('/resetpasswordotpverify', [EmployeeLoginController::class, 'resetpasswordotpverify'])->name('resetpasswordotpverify');
Route::post('/resetpasswordchange', [EmployeeLoginController::class, 'resetpasswordchange'])->name('resetpasswordchange');
Route::post('/changepasswordadmin', [EmployeeLoginController::class, 'changepasswordadmin'])->name('changepasswordadmin');



// end of passwords
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// employee Registration 

Route::get('/EmployeeRegister', [EmployeeLoginController::class, 'EmployeeRegister'])->name('EmployeeRegister');
Route::post('/EmployeeRegistrationsubmit', [EmployeeLoginController::class, 'EmployeeRegistrationsubmit'])->name('EmployeeRegistrationsubmit');

// register for Employee
Route::get('/EmployerRegistration', [EmployeeLoginController::class, 'EmployeeeRegister'])->name('EmployeeeRegister');
Route::get('/getStatesByCountry', [EmployeeLoginController::class, 'getStatesByCountry'])->name('getStatesByCountry');
Route::get('/EmployerRegister', [EmployerLoginController::class, 'EmployerRegister'])->name('EmployerRegister');
Route::post('/EmployeeSumitRegistration', [EmployeeLoginController::class, 'EmployeeSumitRegistration'])->name('EmployeeSumitRegistration');
Route::get('/validateMail', [EmployeeLoginController::class, 'validateMail'])->name('validateMail');
Route::get('/Userlogin', [EmployeeLoginController::class, 'LoginRoute'])->name('LoginRoute');

Route::get('/EmployeeLogin', [EmployeeLoginController::class, 'EmployeeLogin'])->name('EmployeeLogin');
Route::get('/EmployeeHome', [EmployeeLoginController::class, 'EmployeeHome'])->name('EmployeeHome');
// Route::get('/EmployeeHome', [EmployeeLoginController::class, 'EmployeeHome'])->name('EmployeeHome');
// Route::post('/test', [EmployeeLoginController::class, 'test'])->name('test');
 


/// user 
Route::get('/Jobs', [JobApplicationController::class, 'Jobslisting'])->name('Jobslisting');
Route::post('/ApplyJob', [JobApplicationController::class, 'ApplyJob'])->name('ApplyJob');
Route::post('/removeApplyJob', [JobApplicationController::class, 'removeApplyJob'])->name('removeApplyJob');


// 


//purchase plan
// employeer

Route::post('/Updatepostskill', [JobPostsController::class, 'Updatepostskill'])->name('Updatepostskill');
Route::get('/Viewapplicantdetails/{id?}', [JobPostsController::class, 'Viewapplicantdetails'])->name('Viewapplicantdetails');
Route::get('/viewrecivedapplications/{id?}', [JobPostsController::class, 'viewrecivedapplications'])->name('viewrecivedapplications');
Route::post('/purchaseplan', [PaymentController::class, 'purchaseplan'])->name('purchaseplan');
Route::post('/paymentinitiate', [PaymentController::class, 'purchaseplaninfo'])->name('paymentinitiate');
Route::get('/transactionsuccess', [PaymentController::class, 'transactionsuccess'])->name('transactionsuccess');
Route::get('/paymentsuccess', [PaymentController::class, 'paymentsuccess'])->name('payment.success');
Route::post('/paymentsuccesspage', [PaymentController::class, 'paymentsuccesspage'])->name('payment.successpage');

Route::get('/EmployeerDashboard', [EmployerController::class, 'EmployeerDashboard'])->name('EmployeerDashboard');
Route::get('/EmployerCreatePost', [EmployerController::class, 'EmployeerCreatePost'])->name('EmployeerCreatePost');
Route::post('/Createpost', [EmployerController::class, 'Createpost'])->name('Createpost');
Route::post('/Updatepost', [EmployerController::class, 'Updatepost'])->name('Updatepost');
Route::match(['get', 'post'], '/viewposts', [EmployerController::class, 'viewposts'])->name('viewposts');
Route::match(['get', 'post'], '/viewposts/closed', [EmployerController::class, 'viewpostsclosed'])->name('viewpostsclosed');
Route::match(['get', 'post'], '/viewposts/inactive', [EmployerController::class, 'viewpostsinactive'])->name('viewpostsinactive');

Route::get('/viewpostsinfo', [EmployerController::class, 'viewpostsinfo'])->name('viewpostsinfo');
Route::post('/viewpostsinfo', [EmployerController::class, 'viewpostsinfo'])->name('viewpostsinfodata');
Route::get('/addcandidate', [EmployerController::class, 'addcandidate'])->name('addcandidate');
Route::post('/getjobdetails/{id?}', [EmployerController::class, 'getjobdetails'])->name('getjobdetails');
Route::post('/postcandidate', [EmployerController::class, 'postcandidate'])->name('postcandidate');
Route::post('/updatecandidate', [EmployerController::class, 'updatecandidate'])->name('updatecandidate');
Route::match(['get', 'post'], '/addedcandidatelist', [EmployerController::class, 'addedcandidatelist'])->name('addedcandidatelist');
Route::match(['get', 'post'], '/viewcandidateApplications/{id?}', [EmployerController::class, 'viewcandidateApplications'])->name('viewcandidateApplications');

Route::get('/inactivecandidatelist', [EmployerController::class, 'inactivecandidatelist'])->name('inactivecandidatelist');
Route::get('/closecandidatelist', [EmployerController::class, 'closecandidatelist'])->name('closecandidatelist');
Route::get('/employercandidate/{id}', [EmployerController::class, 'employercandidate'])->name('employercandidate');
Route::get('/Employerjobs', [JobPostsController::class, 'Employerjobs'])->name('Employerjobs');
Route::get('/Employerprofile', [ProfileController::class, 'Employerprofile'])->name('Employerprofile');
Route::post('/editprofile', [ProfileController::class, 'editprofile'])->name('editprofile');
Route::get('/employereditpost/{id?}', [JobPostsController::class, 'employereditpost'])->name('employereditpost');
Route::post('/DeleteJob', [JobPostsController::class, 'DeleteJob'])->name('DeleteJob');
Route::post('/RestoreJob', [JobPostsController::class, 'RestoreJob'])->name('RestoreJob');
Route::post('/startsession', [JobPostsController::class, 'startsession'])->name('startsession');
Route::post('/searchpost', [JobPostsController::class, 'searchpost'])->name('searchpost');
Route::post('/getcandidatedetails', [JobPostsController::class, 'getcandidatedetails'])->name('getcandidatedetails');
Route::get('/EmployerUsers', [EmployerUsersController::class, 'EmployerUsers'])->name('EmployerUsers');
Route::get('/EmployerUserCreate', [EmployerUsersController::class, 'EmployerUserCreate'])->name('EmployerUserCreate');
Route::post('/CreateNewUser', [EmployerUsersController::class, 'CreateNewUser'])->name('CreateNewUser');
Route::post('/activeuser', [EmployerUsersController::class, 'activeuser'])->name('activeuser');
Route::post('/inactiveuser', [EmployerUsersController::class, 'inactiveuser'])->name('inactiveuser');
Route::post('/jobPostClose', [JobPostsController::class, 'jobPostClose'])->name('jobPostClose');
Route::post('/jobClose', [JobPostsController::class, 'jobClose'])->name('jobClose');

Route::get('/contactemail/{id}', [JobPostsController::class, 'contactemail'])->name('contactemail');
Route::post('/sendemail', [JobPostsController::class, 'sendemail'])->name('sendemail');

// access for all
Route::get('/Ticketview', [RaiseTicketController::class, 'Ticketview'])->name('Ticketview');
Route::post('/RaiseTicket', [RaiseTicketController::class, 'RaiseTicket'])->name('RaiseTicket');
Route::get('/subscriptionsview', [SubscriptionController::class, 'subscriptionsview'])->name('subscriptionsview');

Route::match(['get', 'post'], '/applications-recived/{id?}', [JobPostsController::class, 'viewApplications'])->name('viewApplications');

// Route::get('/applications-recived/{id?}', [JobPostsController::class, 'viewApplications'])->name('viewApplications');
Route::get('/recivedapplications/{id?}', [JobPostsController::class, 'getApplicationsRecived'])->name('getApplicationsRecived');

// Route::get('/candidates/recived/{id?}', [JobPostsController::class, 'viewcandidateApplications'])->name('viewcandidateApplications');
Route::get('/recivedcandidateapplications/{id?}', [JobPostsController::class, 'recivedcandidateapplications'])->name('recivedcandidateapplications');

// logout
Route::get('/userlogout', [UserController::class, 'userlogout'])->name('userlogout');

// sales

Route::match(['get', 'post'], '/jobapply', [JobsApplyController::class, 'ApplyJob'])->name('sales.jobapply');
Route::get('/jobappliedlist', [JobsApplyController::class, 'jobappliedlist'])->name('jobappliedlist');


Route::post('/applyCandidateJob', [JobsApplyController::class, 'applyCandidateJob'])->name('sales.applyCandidateJob');


Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::any('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');









