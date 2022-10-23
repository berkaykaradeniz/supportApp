<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;


class UsersController extends Controller
{
    public function index()
    {
        //
    }


    public function get(Users $user){
        $user_id = request('id');
        $users = $user->find($user_id);
        if ($users)
        {
            return [
                'name' => $users->name,
                'email' => $users->email,
                'status' => 'Success'
            ];
        }
        else{
            return [
                'status' => 'Fail'
            ];  
        }
    }
    public function login(){
    
        $user = Users::where('email', request('email'))->first();

        if (!$user || ! Hash::check(request('password'), $user->password)) {
            return response([
                'message' => ['The provided credentials are incorrect.']
            ], 404);
        }

        $userToken = $user->createToken('api-token')->plainTextToken;
    
        return response(
            [
                'token' => $userToken,
                'user_id' => $user->id        
            ], 200);
    }

   public function store(){
    request()->validate([//Request Controls needs to be add here.
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $password = request('password');
        return Users::create([//Get request and post this columns.
            'name' => request('name'),
            'email' => request('email'),
            'group_id' => 3,
            'password' => Hash::make($password)
        ]);
    }

    public function delete(Users $user){
        $status = $user->delete();

        return [
            'status' => $status
        ];
    }
}
