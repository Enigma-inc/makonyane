@extends('layouts.app') 
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                    <div class="panel-body">
                    @if(Gate::allows('view-users', $user))
                        @foreach($emails as $email)
                        <div class="col-md-4 margin-top-5">
                            <div class="panel emails-index panel-default">
                                <div class="panel-heading">
                                    <div class="header text-center"><strong>Subject: </strong>{{ $email->subject }}</div>
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
                    @elseif(Gate::denies('view-users', $user))
                        <script>
                            window.location = "/"
                        </script>
                    @endif            
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
                height: '170px',
                color: '#e13f30',
                railVisible: true,
                alwaysVisible: true
            });
        });        
</script>
@endsection
