<div class="flex">
  <form method="POST" action="/tweets/{{ $tweet->id }}/like">
    @csrf
    
    <div class="flex items-center mr-4">
      <button class="text-xs text-gray-500 {{ $tweet->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }}">
        like
        {{ $tweet->likes ?: 0 }}
      </button>
    </div>
  </form>

  <form method="POST" action="/tweets/{{ $tweet->id }}/like">
    @csrf
    @method('DELETE')
    <div class="flex items-center">
      <button class="text-xs text-gray-500 {{ $tweet->isDisLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }}">
        dislike
        {{ $tweet->dislikes ?: 0 }}
      </button>
    </div>
  </form>
</div>