@foreach($posts as $post)
    {{ $post->title }}
    {{ str_limit($post->body) }}
@endforeach