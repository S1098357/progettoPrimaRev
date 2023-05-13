<!DOCTYPE html>
<html>
@extends('layout.layout')

<link rel="stylesheet" type="text/css" href="{{URL('css\login.css') }}">
@section('content')


    <div class="center">
        <h1>Login</h1>
        <form action="{{route('loginPost')}}" method="POST" class="form">
            @csrf
            <div class="txt_field">
                <input type="text" required name="username">
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="password">
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="home">
            <div class="signup_link">
                Not a member? <a href="signup">Signup</a>
            </div>
        </form>
    </div>

@endsection
</html>
