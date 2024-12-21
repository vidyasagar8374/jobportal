<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employerplan;

class Purchaseplan extends Model
{
    use HasFactory;
    public function plandetails()
    {
        return $this->hasone(Employerplan::class, 'id', 'payment_id');
    }
}
