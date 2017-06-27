<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\EmailSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;

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
        $emails = Email::latest()
                ->where('user_id', Auth::user()->id)
                ->paginate(6);

        return view('emails.index')->with(['emails'=>$emails]);
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
        'email' => 'required|unique:emails',
        'subject' => 'required',
        'file' => 'required',
        'message' => 'required',
        ]);

        $file=$request->file('file');
        $fileName = str_slug(Carbon::now()->toDayDateTimeString())
               ."-".$file->getClientOriginalName();
        $file->move('email-docs',$fileName);

        $email = Email::create([
            'doc_path' => $fileName,
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),
            'user_id'=> Auth::User()->id
        ]);

        Mail::to($email)
            ->send(new EmailSent($user, $email));
        
        LaravelSweetAlert::setMessage([
                        'title' => 'Thank you',
                         'text'=>'Your email has been successfully sent!',
                        'type' => 'success'
                    ]);
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
