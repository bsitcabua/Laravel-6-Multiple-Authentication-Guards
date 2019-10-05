@extends('layouts.master')

@section('content')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                User Registration
            </a>
        </div>
    </div>
</nav>
<div class="wrapper">
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Sign Up</strong></h3>
                    </div>

                    <div class="panel-body">

                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        @if(session('msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msg') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('signup.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" class="form-control border-input">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" class="form-control border-input">
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea type="text" name="address" id="address" placeholder="Address" class="form-control border-input">{{ old('address') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control border-input">
                            </div>

                            <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" class="form-control border-input">
                                </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection