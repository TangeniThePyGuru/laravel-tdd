@foreach($posts as $post)
    {{ $post->title }}
    {{ str_limit($post->body) }}
    <a href="/posts/{{ $post->id }} ">View Post Details</a>
@endforeach