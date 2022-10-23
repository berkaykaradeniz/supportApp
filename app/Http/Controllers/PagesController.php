<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function panelIndex()
    {
        return view('panel.index');
    }
    public function tickets()
    {
        return view('panel.tickets');
    }
    public function ticketCreate()
    {
        return view('panel.ticketCreate');
    }
}
