<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpostsskill extends Model
{
    use HasFactory;
    protected $table = 'jobpostsskills';
    public function info()
    {
        return $this->hasone(Techonology::class, 'id', 'techonology_id');
    }
    // public function skillname()
    // {
    //     return $this->hasone(Techonology::class, 'id', 'techonology_id');
    // }
}
