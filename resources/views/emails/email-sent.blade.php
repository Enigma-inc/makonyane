@component('mail::message')
#{{$user->name}} submitted a message
@component('mail::panel')
Below are the details of the message.
@endcomponent


@component('mail::table')
|                |    |
| -------------  | --------:|
| **Title**  | {{$email->subject}}      |
| **Name**  | {{$email->name}}      |
| **Email**  | {{$email->email}}      |
| **Message**  | {{$email->message}}      |
@endcomponent
@endcomponent