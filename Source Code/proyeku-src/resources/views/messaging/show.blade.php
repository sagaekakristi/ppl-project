@foreach($messages_received as $a_message)
<p>
{{ $a_message->sender_user_id }}
{{ $a_message->message_content }}
{{ $a_message->created_at }}
</p>
@endforeach

@foreach($messages_sent as $a_message)
<p>
{{ $a_message->sender_user_id }}
{{ $a_message->message_content }}
{{ $a_message->created_at }}
</p>
@endforeach


{{ Form::open(array('url' => 'message')) }}
{{ Form::hidden('to_id', $sender_user_id) }}
{{ Form::hidden('from_id', Auth::user()->id) }}
<div class="form-group">
    {{ Form::label('message', 'Pesan') }}
    {{ Form::text('message', Input::old('message'), array('class' => 'form-control')) }}
</div>
{{ Form::submit('Send!', array('class' => 'btn btn-success')) }}
{{ Form::close() }}