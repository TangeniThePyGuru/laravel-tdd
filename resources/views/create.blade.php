@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="/posts" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="title">
                        <textarea type="text" name="body"></textarea>
                        <button type="submit">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
