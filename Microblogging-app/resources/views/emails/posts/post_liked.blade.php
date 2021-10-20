@component('mail::message')
# Your Post was liked

{{$liker->name}} Liked you posts. 

@component('mail::button', ['url' => route('posts.show', $poster)])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
