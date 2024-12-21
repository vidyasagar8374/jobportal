<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidateskill extends Model
{
    use HasFactory;
    public function skillname()
    {
        return $this->hasOne(Techonology::class, 'id', 'skill');
    }
    public function skilldetails()
    {
        return $this->hasOne(Techonology::class, 'id', 'skill');
    }
}
