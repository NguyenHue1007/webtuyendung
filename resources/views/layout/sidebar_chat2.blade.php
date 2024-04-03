<aside>
    <header>
        <input type="text" placeholder="search">
    </header>
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{route('chats_employer',$user->id)}}">
                    <img src="{{ url(Storage::url($user->avatar)) }}" width="45" alt="">
                    <div>
                        <h2>{{ $user->name }}</h2>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</aside>
