<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employercandidate extends Model
{
    use HasFactory;
    public function addedskills()
    {
        return $this->hasmany(Candidateskill::class, 'candId', 'id');
    }
    public function getAppliedlist(){
        return $this->hasone(Jobsapplied::class, 'user_id', 'id');
    }
    
    
}
