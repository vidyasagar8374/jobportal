<?php

namespace App\Http\Traits;
use App\Models\User;
use App\Models\Employeedetail;
use Illuminate\Http\Request;

trait EmployeeRegistrationTrait {
    // public function RegistrationValidation($data)
    // {
    //     $this->validate($data,[
    //      'email'=>'required|unique:users'
    //   ]);
    // }
    public function NewEmployeeRegister($data)
    {
    //    dd($data);
        try{
            $data['role'] = 2;
            $data['isactive'] = 1;
            $data['password'] = \Hash::make($data['password']);

            $CreateRecord = User::create($data);
            if($CreateRecord)
            {
                $data['user_id'] = $CreateRecord->id;
                $BasicDetails = Employeedetail::create($data);
                if($BasicDetails)
                {
                    return 1;
                }
                return 0;
            }
        }catch(\Exception $e){
            dd($e);
            \Log::error($e);
            return 0;
        }
    }
 }