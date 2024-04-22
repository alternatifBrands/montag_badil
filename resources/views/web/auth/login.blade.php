@extends('web.auth.auth_layout')
@section('title','Login Page')
@section('content')
<div>
    @error('errors')
    <span class="text-dark">{{ $message }}</span>
    <br><br>
    @enderror
</div>
<form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="form-group">
        <input class="form-control" value="{{old('email')}}" type="email" name="email" placeholder="E-mail Address"
            required>
    </div>
    <div class="form-group">
        <input class="form-control" value="{{old('password')}}" type="password" name="password" placeholder="Password"
            required>
    </div>
    <div class="form-button">
        <button id="submit" type="submit" class="ibtn">Login</button>
        <a href="{{route('forget')}}">Forget password?</a>
    </div>
</form>
@endsection