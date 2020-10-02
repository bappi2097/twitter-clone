@extends('layouts.app')

@section('content')
<header class="mb-6 relative">
    <img class="mb-2" src="{{asset('images/default-profile-banner.jpg')}}" alt="">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div>
            <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
            <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow Me</a>
        </div>
        <img class="rounded-full mr-2 absolute" style="width: 150px; left: calc(50% - 75px); top: 138px;"
            src="{{auth()->user()->avatar}}" alt="">
    </div>
    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum deserunt porro impedit cum
        quos assumenda, illum hic. Laudantium aliquam officia explicabo possimus soluta a, impedit distinctio
        officiis repudiandae vitae voluptatibus qui. Facere fuga pariatur quibusdam ea ex officiis aut quae
        necessitatibus nisi accusantium explicabo enim doloribus magnam incidunt, qui assumenda.</p>
</header>

@include('_timeline',[
'tweets' => $user->tweets
])
@endsection