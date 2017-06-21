<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $people = User::latest()->paginate(6);

        return view('emails.admin-panel', compact('people'));
    }
}
