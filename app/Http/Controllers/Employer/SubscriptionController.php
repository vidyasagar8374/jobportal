<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscriptionsview()
    {
        return view('Employer/subscriptionsview');
    }
}
