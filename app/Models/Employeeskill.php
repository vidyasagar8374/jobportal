<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeeskill extends Model
{
    use HasFactory;
    protected $table = 'employerskills';
    public function skilldetails()
    {
        return $this->hasone(Techonology::class, 'id', 'skillid');
    }
}
