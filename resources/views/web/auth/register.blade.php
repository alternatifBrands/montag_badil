@extends('web.auth.auth_layout')
@section('title','Register Page')
@section('content')
<form method="POST" action="{{ route('register.post') }}">
    @csrf
    <div class="form-group">
        <input 
            class="form-control" 
            type="text" 
            name="name" 
            placeholder="Enter Your Username" 
            value="{{ old('name') }}"/>
        @error('name')
            <span class="text-dark">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input 
            class="form-control" 
            type="email" 
            name="email" 
            placeholder="Enter Your E-mail Address"  
            value="{{ old('email') }}"/>
        @error('email')
            <span class="text-dark">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input 
            class="form-control" 
            type="password" 
            name="password" 
            placeholder="Enter Your Password"  
            value="{{old('password')}}"/>
        @error('password')
            <span class="text-dark">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-button">
        <button id="submit" type="submit" class="ibtn">Register</button>
    </div>
</form>
@endsection