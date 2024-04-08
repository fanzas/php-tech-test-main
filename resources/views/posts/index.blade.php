@extends('layout')
@section('content')

<div class="container">
    @if(session('status'))
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    @foreach($posts as $post)
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('posts.show', ['id' => $post->id])}}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <h3>By {{ $post->author->name }}</h3>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection