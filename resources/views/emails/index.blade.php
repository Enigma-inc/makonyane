@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="sec-title">
        <h3 align="center" class="header margin-top-30">Sent Emails</h3>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                    <div class="panel-heading">
                          <a href="{{ route('email.create') }}"><button class="btn btn-primary hearder margin-left-500">Send Email</button></a>
                    </div>
                    <div class="panel-body">
                        @foreach($emails as $email)
                        <div class="col-md-6 margin-top-5">
                            <div class="panel emails-index panel-default">
                                <div class="panel-heading">
                                    <div class="header">
                                        <div><strong>To: </strong>{{ $email->email }}</div>
                                        <div><strong>Subject: </strong>{{ $email->subject }}</div>                                        
                                    </div>
                                </div>
                                <div class="panel-body email">
                                    <p>{{ $email->message }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    <div class="text-center">
                        {{ $emails->links() }}
                    </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    //Add slim scroll
      $(function(){
            $('.email').slimScroll({
                height: '145px',
                color: '#e13f30',
                railVisible: true,
                alwaysVisible: true
            });
        });        
</script>
@endsection