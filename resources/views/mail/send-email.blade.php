@component('mail::message')

<p><span style="font-weight: 600; color:#3d4852">Name</span> : {{ $maildata['name'] }} </p>
<p><span style="font-weight: 600; color:#3d4852">Email</span> : {{ $maildata['email'] }}</p>
<p><span style="font-weight: 600; color:#3d4852">Message</span> : {{ $maildata['message'] }}</p>


Thanks,<br>
{{ $maildata['name'] }}
@endcomponent
