<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Users;
use App\Models\TicketAnswers;

class TicketsController extends Controller
{

    //TODO: CREATE TOKEN AND CHECK TOKEN EKLENECEK
    public function index()
    {
        return Ticket::all();
    }

    public function get(Ticket $tickets){
        $user_id = request('user_id');
        $tickets = $tickets
                        ->where('user_id', $user_id)
                        ->get();
        if ($tickets)
        {
            return $tickets->toJson();
        }
        else{
            return [
                'status' => 'Fail'
            ];  
        }
    }

    public function getDepartmentUserRandom(Users $users){
        $department_id = request('department_id');

        $users = $users
                        ->where('department_id', $department_id)
                        ->where('group_id', 2)
                        ->inRandomOrder()
                        ->first();
        if ($users)
        {
            return $users->toJson();
        }
        else{
            return [
                'status' => 'Fail'
            ];  
        }
    }

   public function createTicket(){
        request()->validate([//Request Controls needs to be add here.
            'department_id' => 'required',
            'title' => 'required',
            'user_id' => 'required',
            'description' => 'required',

        ]);
    
        return Ticket::create([//Get request and post this columns.
            'department_id' => request('department_id'),
            'title' => request('title'),
            'user_id' => request('user_id'),
            'description' => request('description')
        ]);
    }

    public function getTicket(Ticket $ticket){
        $ticket_id = request('ticket_id');

        $ticket = $ticket
                        ->where('id', $ticket_id)
                        ->first();
        if ($ticket)
        {
            return $ticket->toJson();
        }
        else{
            return [
                'status' => 'Fail'
            ];  
        }
    }

    public function sendTicketAnswer(){
        request()->validate([//Request Controls needs to be add here.
            'ticket_id' => 'required',
            'user_id' => 'required',
            'answer' => 'required'
        ]);
    
        return TicketAnswers::create([//Get request and post this columns.
            'ticket_id' => request('ticket_id'),
            'user_id' => request('user_id'),
            'answer' => request('answer')
        ]);
    }

    public function listTicketAnswers(TicketAnswers $ticketAnswers){
        $ticket_id = request('ticket_id');

        $ticketAnswers = $ticketAnswers
                        ->where('ticket_id', $ticket_id)
                        ->get();
        if ($ticketAnswers)
        {
            return $ticketAnswers->toJson();
        }
        else{
            return [
                'status' => 'Fail'
            ];  
        }
    }


    public function delete(Ticket $ticket){
        $status = $ticket->delete();

        return [
            'status' => $status
        ];
    }
}
