<div class="bg-gray-200 border border-gray-300 rounded-xl py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @forelse (auth()->user()->follows as $user)
        <li class="{{$loop->last ? '' : 'mb-4'}}">
            <div>
                <a class="flex items-center text-sm" href="{{route('profile',$user)}}">
                    <img class="rounded-full mr-2" src="{{$user->avatar}}" alt="" width="50" height="50">
                    {{$user->name}}
                </a>
            </div>
        </li>
        @empty
        <li>No Friend Yet!</li>
        @endforelse
    </ul>
</div>