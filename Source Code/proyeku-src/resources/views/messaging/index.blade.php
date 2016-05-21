@foreach($messages as $a_message)
<p>
<a href="{{ URL::to('message/' . $a_message->sender_user_id) }}">{{ $a_message->sender_user_id }}</a>
{{ $a_message->message_content }}
{{ $a_message->created_at }}
</p>
@endforeach