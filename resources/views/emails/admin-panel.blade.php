@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="sec-title">
        <h3 align="center" class="header margin-top-30">All Users</h3>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($people as $user)
                        <div class="col-md-4 margin-top-5">
                            <div class="panel emails-index panel-default">
                                <div class="panel-heading">
                                    <div class="header"></strong>{{ $user->name }}</div>
                                </div>
                                <div class="panel-body">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    <div class="text-center">
                        {{ $people->links() }}
                    </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
