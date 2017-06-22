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
                                    <div class="header text-center">{{ $user->name }}</div>
                                </div>
                                <div class="panel-body user-panel-body">
                                    <p align="center"><strong>Email Adress: </strong>{{ $user->email }}</p>
                                    <p><h2 align="center">{{ $user->emails_count }}</h2></p>                                    
                                </div>
                                <div class="panel-footer">
                                    <a href="{{ route('users.single', $user->id) }}"><button class="margin-left-90 btn btn-sm btn-primary">View Sent Emails</button></a>                                
                                </div>
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
