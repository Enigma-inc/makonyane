@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="sec-title">
        <h3 align="center" class="header margin-top-30">Sent Emails</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">

                <div class="panel-body">
                    @can('view', $emails)
                        @foreach($emails as $email)
                        <ul>
                            <li>{{ $email->email }}</li>
                            <li>{{ $email->subject }}</li>
                            <li></li>
                        </ul>
                        @endforeach
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

@endsection