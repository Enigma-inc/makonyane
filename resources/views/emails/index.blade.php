@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="sec-title">
        <h3 align="center" class="header margin-top-30">Sent Emails</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                    <div class="panel-heading">
                          <a href="{{ route('email.create') }}"><button class="btn btn-primary hearder">Send Email</button></a>
                    </div>
                        @foreach($emails as $email)
                        <div class="col-md-4 profile margin-top-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="header">{{$email->email}}</div>
                                </div>
                                <div class="panel-body">
                                    <p>Email: {{ $email->email }} </p>
                                    <p>{{ $email->message }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach 

                    <div class="text-center">
                        {{ $emails->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="col-md-4 profile margin-top-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class=" header">{{Auth::user()->fullName()}}</div>
                            </div>

                            <div class="panel-body">
                                <div class="avatar-container">
                                    <img class="avatar thumbnail"  src="{{Auth::user()->submission->country_flag}}" alt="Image">
                                </div>


                                <div class="details-container">
                                    <div class="profile-label">Name</div>
                                    <div class="profile-info">{{Auth::user()->submission->title. " ".Auth::user()->submission->name. " ".Auth::user()->submission->surname}}</div>
                                </div>
                                <hr>

                                <div class="details-container">
                                    <div class="profile-label">Organisation</div>
                                    <div class="profile-info">{{Auth::user()->submission->organisation}}</div>
                                </div>
                                <hr>

                                <div class="details-container">
                                    <div class="profile-label">Country</div>
                                    <div class="profile-info">{{Auth::user()->submission->country}}</div>
                                </div>
                                <hr>

                                <div class="details-container">
                                    <div class="profile-label">Phone</div>
                                    <div class="profile-info">{{Auth::user()->submission->phone_code . " ".Auth::user()->submission->phone}}</div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <form role="form" action="{{route('enable.profile.edit',Auth::user()->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-primary btn-xs  col-xs-6"><i class="fa fa-pencil"></i> Edit Profile</button>
                                            <a class="btn btn-primary btn-xs  col-xs-6" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                               <i class="fa fa-lock"></i> Logout
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>