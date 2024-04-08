@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Login</h1>
            <form action="{{ route('authenticate') }}" method="post">
                @csrf
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="username" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Log In</button>
            </form>
        </div>
    </div>
</div>
@endsection