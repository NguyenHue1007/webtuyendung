@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/chats.css') }}">
@endpush
@section('content')
    <div id="container">
        @INCLUDE('layout.sidebar_chat')
        <main>
            <header class="d-flex align-items-center">
                <img src="{{ url(Storage::url($employer->logo)) }}" width ="55"alt="">
                <div>
                    <h2>{{ $employer->company }}</h2>
                </div>
            </header>
            <ul id="chat">
				@foreach($allMessages as $message)
				@if($message->sender_id == Auth::user()->id)
				<li class="me">
                    <div class="entete">
                        <h3>{{ $message->created_at->format('h:i A, F j') }}</h3>
                        <span class="status blue"></span>
                    </div>
                    <div class="message">
                        {{$message->message}}
                    </div>
                </li>
				@else
                <li class="you">
                    <div class="entete">
                        <span class="status green"></span>
                        <h3>{{ $message->created_at->format('h:i A, F j') }}</h3>
                    </div>
                    <div class="message">
                        {{$message->message}}
                    </div>
                </li>
				@endif
				@endforeach
            </ul>
            <form method="POST" action="{{route('send_message_to_employer')}}">
				@csrf
                <footer>
					<input type="hidden" value="{{$employer->id}}" name="receiver_id">
                    <textarea placeholder="Type your message" name="message"></textarea>
                    <button class="btn" type="submit">Send</button>
                </footer>
            </form>
        </main>
    </div>
@endsection
