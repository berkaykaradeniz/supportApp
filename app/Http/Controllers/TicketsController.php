<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Users;


class TicketsController extends Controller
{

    //TODO: CREATE TOKEN AND CHECK TOKEN EKLENECEK
    public function index()
    {
        return Ticket::all();
    }

    public function get(Ticket $tickets){
        //user_id ve meal_date yollayarak günün öğününü getireceğim.
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

   public function store(){
       
    request()->validate([//Request Controls needs to be add here.
            'meal_name' => 'required',
            'meal_date' => 'required',
            'user_id' => 'required',
        ]);
    
        return Ticket::create([//Get request and post this columns.
            'meal_date' => request('meal_date'),
            'meal_name' => request('meal_name'),
            'user_id' => request('user_id')
        ]);
    }

    public function update(Ticket $ticket){
        request()->validate([//Request Controls needs to be add here.
            'meal_name' => 'required',
            'meal_date' => 'required',
        ]);
    
       $status = $meal->update([
            'meal_date' => request('meal_date'),
            'meal_name' => request('meal_name')
        ]);
    
        return [
            'status' => $status
        ];
    }

    public function delete(Meals $meal){
        $status = $meal->delete();

        return [
            'status' => $status
        ];
    }
}
