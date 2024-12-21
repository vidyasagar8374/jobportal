<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'noofposts', 'createdby', 'description', 'experience', 'level', 'location', 'mode', 'clientname', 'duration', 'startdate', 'Salary', 'type', 'number', 'contactemail', 'recruiter', 'employer_id', 'salarytype', 'enddate'];
    public function Techonology()
    {
        return $this->hasmany(Jobpostsskill::class, 'jobid', 'id');
    }
    public function jobskills()
    {
        return $this->hasmany(Jobpostsskill::class, 'jobid', 'id');
    }
    public function appliedinfo()
    {
        return $this->hasone(Jobsapplied::class, 'jobid', 'id')->where('user_id', \Auth::user()->id);
    }
    public function userdetails(){
        return $this->hasone(User::class, 'id', 'recruiter');
    }
    public function jobpostsskills(){
        return $this->hasMany(Jobpostsskill::class);
        
    }
}
