@component('mail::message')
# Hi Sketch.

New message from {{ $data->name }} <{{ $data->email }}>

{{ $data->message }}
@endcomponent
