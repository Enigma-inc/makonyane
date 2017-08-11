<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\EmailSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class EmailsController extends Controller
{
    protected $disk;

    function __construct()
    {
        $this->disk = Storage::disk(env('FILE_SYSTEM', 's3'));
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
            //|unique:emails
        'email' => 'required|email',
        'subject' => 'required',
        'file' => 'required',
        'message' => 'required',
        ],[
            'email.unique' => 'Email to this address has already been sent'
        ]);

        $file=$request->file('file');
        $fileName = str_slug(Carbon::now()->toDayDateTimeString())
               ."-".$file->getClientOriginalName();
        $filePath = public_path()."/email-docs/".$fileName;  

        // Storage::disk('local')
        //       ->put($filePath, file_get_contents($fileName), 'public');

        //$file->move('email-docs',$fileName);

        $this->disk->put($filePath, file_get_contents($fileName), 'storage');

        $emailObj = Email::create([
            'doc_path' => $fileName,
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),
            'user_id'=> Auth::User()->id
        ]);
        
        LaravelSweetAlert::setMessage([
                        'title' => 'Success!',
                         'text'=>'Your email has been queued for the next sending session.',
                        'type' => 'success'
                    ]);
            return redirect()->back();
    }

    public function downloadEmail()
    {
        $fileName = Input::get("file-name");
        $filePath = public_path() . "/email-docs/" . $fileName;

        if( file_exists($filePath)){
            $headers = array(
                'Content-Type: '.Storage::mimeType("/email-docs/" .$fileName),
            );
            return Response::download($filePath, $fileName,$headers);
        }
        else{
            return back();
        }

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
