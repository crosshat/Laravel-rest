@extends('layouts.master')
@section('title')
    Welcome!
@endsection()
@section('content')
@if(count($errors)>0)
    <div class="row">
        <div class="col-md-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="row">
        <h3>Sign Up</h3>
        <div class="col-md-6">
            <form action="{{route('signup')}}" method="post">
                <div class="form-group {{$errors->has('email')?'has-error':''}}" >
                    <label for="email">Your e-mail</label>
                    <input value="{{Request::old('email')}}" class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group {{$errors->has('firstname')?'has-error':''}}"  >
                    <label for="firstname">First Name</label>
                    <input value="{{Request::old('firstname')}}" class="form-control" type="text" name="firstname" id="firstname">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}" >
                    <label for="password">Password</label>
                    <input value="{{Request::old('password')}}" class="form-control" type="password" name="password" id="passwordl">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <h3>Sign In</h3>
        <div class="col-md-6">
            <form action="{{route('signin')}}" method="post">
                <div class="form-group {{$errors->has('email')?'has-error':''}}"  >
                    <label for="email">Your e-mail</label>
                    <input value="{{Request::old('email')}}" class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}"  >
                    <label for="password">Password</label>
                    <input value="{{Request::old('password')}}" class="form-control" type="password" name="password" id="passwordl">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection()