@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $post->title }}</h2>
                    <h3>By {{ $post->author->name }}</h3>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection