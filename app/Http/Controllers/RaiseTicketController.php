<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\TicketTrait;

class RaiseTicketController extends Controller
{
    use TicketTrait;
    public function Ticketview()
    {
        return view('TicketView');
    }
    public function RaiseTicket(Request $request)
    {
        $Details = $this->RequestIssue($request->all());
        if($Details == 1)
        {
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
