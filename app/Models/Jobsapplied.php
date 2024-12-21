<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobsapplied extends Model
{
    use HasFactory;
    protected $table = 'jobsapplied';
    public function employeedetails()
    {
        // Employercandidate
        return $this->hasone(User::class, 'id', 'user_id');
    }
    public function postdetails()
    {
        return $this->hasone(Jobpost::class, 'id', 'jobid');
    }
    public function skills(){
        return $this->hasMany(Employeeskill::class, 'employeeinfoid', 'user_id');
    }
    
    public function candidatedetails(){
        return $this->hasone(Employercandidate::class, 'id', 'user_id');
    }
    public function getAppliedlist(){
        return $this->hasone(Employercandidate::class, 'id', 'user_id');
    }
    public function candidateskills(){
        return $this->hasMany(Candidateskill::class, 'candId', 'user_id');
    }
}
