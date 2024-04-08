@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Create a Post</h1>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea name="body" placeholder="Some content here..." class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection