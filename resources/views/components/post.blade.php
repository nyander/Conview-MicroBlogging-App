@props(['post' => $post])

<div class="mb-6">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->username}}</a> <span 
    class="text-gray-600 text-small">{{$post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{$post->body}}</p>

    {{-- Like Buttons --}}
    <div class="flex space-x-4">
        @auth
        @if (!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>                            
                <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>
            </form>                        
        @else
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                @csrf
                @method('DELETE')                                
                <button type="submit" class="text-blue-500">Unlike</button> 
                <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>   
            </form>
        @endif 

        @can('delete', $post)
        <form action="{{route('posts.destroy', $post)}}" method="POST" class="text-right"	>
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 font-semibold	">Delete</button> 
        </form>
        @endcan
        


    @endauth
    </div>
</div>