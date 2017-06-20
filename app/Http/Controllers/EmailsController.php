<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;

class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::latest()->paginate(5);

        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|max:255',
        ]);

      $email = Email::create([
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),
            'user_id'=> \Auth::User()->id
        ]);
        
        Mail::to($request->email)
              ->bcc(['address'=>'neo@enigma.co.ls'])
              ->send(new EmailSent($email));

           $request->session()->flash('flash', "Your emai has been send successfully");
           return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
