<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('registration');
    }
    public function store(Request $request)
    {
        // $users = new User;
        // $users->name = $request['name'];
    }
}
