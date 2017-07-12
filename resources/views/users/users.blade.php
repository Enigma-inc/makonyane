@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="sec-title">
        <h3 align="center" class="header margin-top-30">List Of Users</h3>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                    <div class="panel-body">
                    @if(Gate::allows('view-users', $users))
                        @foreach($users as $user)
                        <div class="col-md-4 margin-top-5">
                            <div class="panel emails-index panel-default">
                                <div class="panel-heading">
                                    <div class="header text-center"><strong class="username">{{ $user->name }}</strong></div>
                                </div>
                                <div class="panel-body user-panel-body">
                                    <p align="center"><strong>Email Adress: </strong>{{ $user->email }}</p>
                                    <p class="emails-h2" align="center">{{ $user->emails_count }}</p>    
                                      <div class="row">
                                    <div class="col-xs-6"><span class="pull-left"><small>SEND:</small> <strong><h3 style="display: inline-block;">{{$user->send_count}}</h3> </strong></span> </div>
                                    <div class="col-xs-6"><span class="pull-right"><small>IN QUEUE:</small> <strong><h3 style="display: inline-block;">{{$user->queue_count}}</h3> </strong> </span> </div>
                                </div>                                
                                </div>
                                @if($user->emails_count > 0)
                                    <div class="panel-footer btn-footer-flex">
                                        <a href="{{ route('users.single', $user->id) }}"><button class="btn btn-sm btn-primary">View Sent Emails</button></a>                                
                                    </div>
                                @endif
                              
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    <div class="text-center">
                        {{ $users->links() }}
                    </div>
                    @elseif(Gate::denies('view-users', $users))
                        <script>
                            window.location = "/"
                        </script>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
