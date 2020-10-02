<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img class="mb-2" src="{{asset('images/default-profile-banner.jpg')}}" alt="">
            <img class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%;" width="150" src="{{$user->avatar}}" alt="">
        </div>
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                <a href="{{$user->path('edit')}}"
                    class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit
                    Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>

        </div>
        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum deserunt porro impedit cum
            quos assumenda, illum hic. Laudantium aliquam officia explicabo possimus soluta a, impedit distinctio
            officiis repudiandae vitae voluptatibus qui. Facere fuga pariatur quibusdam ea ex officiis aut quae
            necessitatibus nisi accusantium explicabo enim doloribus magnam incidunt, qui assumenda.</p>
    </header>

    @include('_timeline',[
    'tweets' => $user->tweets
    ])
</x-app>