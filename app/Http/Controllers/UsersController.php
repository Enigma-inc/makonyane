<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name','asc')
                ->withCount('emails')
                ->paginate(6);

        return view('dashboard')->with(['users'=>$users]);
    }

    public function show($userId)
    {              
        $emails = Email::latest()
                ->where('user_id', $userId)
                ->paginate(6);        
        $user = User::where('id', $userId)->first();

        return view('users.single-user')->with(['emails'=>$emails, 'user'=> $user]);
    }
}
