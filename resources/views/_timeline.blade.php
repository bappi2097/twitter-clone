<div class="border border-gray-300 rounded-xl">
    @forelse ($tweets as $tweet)
    @include('_tweet')
    @empty
    <p class="p-4">No Tweets Yet</p>
    @endforelse
    {{$tweets->links()}}
</div>