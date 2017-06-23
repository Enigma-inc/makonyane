@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="sec-title">
                        <h4 align="center" class="header">Send Email</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="request-form" method="POST" action="{{route('email.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email To</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required autofocus> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                         
                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="subject" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" required> 
                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">Document</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="file"
                                  accept="application/pdf,application/msword,
                                  application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea name="message" rows="8" class="form-control" required></textarea> 
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <div>
                                <button class="btn btn-primary" type="submit">
                                    Send
                                </button>
                            </div>
                        </div>
                        @if (session('flash'))
                        <flash-message title="Success!" type="success" message="{{ session('flash') }}"></flash-message>

                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
