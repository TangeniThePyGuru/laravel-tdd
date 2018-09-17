@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($posts as $post)
                        {{ $post->title }}
                        {{ str_limit($post->body) }}
                        <a href="/posts/{{ $post->id }} ">View Post Details</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
