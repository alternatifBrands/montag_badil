@extends('web.auth.auth_layout')
@section('title','Forget Page')
@section('content')
<h3>Password Reset</h3>
<p>To reset your password, enter the email address you use to sign in to iofrm</p>
<form action="{{ route('forget.post') }}" method="POST">
    @csrf
    <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="form-button full-width">
        <button id="submit" type="submit" class="ibtn btn-forget">Send Reset Link</button>
    </div>
</form>
@endsection