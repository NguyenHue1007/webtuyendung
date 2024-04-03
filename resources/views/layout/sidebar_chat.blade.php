<aside>
    <header>
        <input type="text" placeholder="search">
    </header>
    <ul>
        @foreach ($employers as $employer)
            <li>
                <a href="{{route('chats',$employer->id)}}">
                <img src="{{ url(Storage::url($employer->logo)) }}" width="45" alt="">
                <div>
                    <h2>{{ $employer->company }}</h2>
                    {{-- <h3>
						<span class="status orange"></span>
						offline
					</h3> --}}
                </div>
                </a>
            </li>
        @endforeach
    </ul>
</aside>
