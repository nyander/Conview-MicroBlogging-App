@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{$user->username}}</h1>
                <p>{{$posts->count()}} {{Str::plural('Post', $posts->count())}} | {{$user->recievedLikes->count()}} {{Str::plural('Like', $user->recievedLikes->count())}}</p>
                <p></p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                {{-- LIST OF POSTS --}}
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post=$post />
                    @endforeach
                    {{$posts->links()}}
                @else
                <p>No Posts Available</p>
                @endif
            </div>
            

           
        </div>
    </div>
@endsection