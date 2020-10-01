<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @foreach (range(1, 8) as $index)
    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img class="rounded-full mr-2" src="{{asset('images/dummy/40-1.jpg')}}" alt="">
            John Doe
        </div>
    </li>
    @endforeach
</ul>