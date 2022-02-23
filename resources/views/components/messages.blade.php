<div id="message">
    @foreach ($messages as $message)
    <div>
      <br><br>
      {{$message['created_at']}}<br>
      {{$message['email']}}<br>
      {{$message['introduce_yourself']}}<br>
      <i>{{$message['text_of_message']}}</i>
    </div>
    @endforeach
</div>
