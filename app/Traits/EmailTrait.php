<?php

namespace App\Traits;
use App\Models\User;

trait EmailTrait{
    public function sendEmail($emailType, $data)
    {
        if($emailType == 'team register'){
            $this->sendEmailtoHrOrMarketer($data);
        }
    }
    public function sendEmailtoHrOrMarketer($data){
        $data = array(
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role']
        );
        \Mail::send(['html'=>'mails.HrOrMarketer'], $data, function($message) use($data) {
        $message->to($data['email'], 'JobPortal')->subject
            ('Welcome To Job Portak');
        $message->from('venkat.t@softhouz.com','admin');
        });
        \Log::error('mail sent');
        // return 1;
    } 
    public function registrationConfirmationEmail($data){
        // dd($data);
        $email = $data['email'];
        \Mail::send(['html'=>'mails.registrationemail'], $data,  function($message) use($email) {
            $message->to($email, 'JobPortal')->subject
                ('Welcome To Job Portal');
            $message->from('venkat.t@softhouz.com','admin');
        });
    }

    public function newpostConfirmation(){
        // dd($data);
        $data = array();
        $email = User::where('belongsto', \Auth::user()->id)->orwhere('id', \Auth::user()->id)->select('email')->get();
        foreach($email as $e){
            \Mail::send(['html'=>'mails.newpost'],  function($message) use($e) {
                $message->to($e, 'JobPortal')->subject
                    ('New Job Post Creation');
                $message->from('venkat.t@softhouz.com','admin');
            });
        }
       
    }
}
?>