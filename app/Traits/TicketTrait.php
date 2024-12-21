<?php
namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\Ticket;

trait TicketTrait{
    public function RequestIssue($details)
    {
        // try{
            $requestIssue = new Ticket;
            $requestIssue->issue = $details['issue'];
            $requestIssue->description = $details['description'];
            $requestIssue->contact = $details['mail'];
            $requestIssue->isclosed = 0;
            $requestIssue->requestedby = \Auth::user()->id;
            $requestIssue->isactive = 1;
            $requestIssue->save();
            \Mail::send(['html'=>'mails.ticket'], $details, function($message) {
            $message->to('chanduakula111@gmail.com', 'Job Portal')->subject
                ('Ticket Raised');
            $message->from('venkat.t@softhouz.com','admin');
            });
            
            if($requestIssue)
            {
                return 1;
            }
            return 0;
        // }
        // catch(\Exception $e)
        // {
           
        //     return 0;
        // }
        
    }

}
?>