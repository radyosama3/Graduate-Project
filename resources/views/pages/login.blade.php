@extends('structure')

@section('pageName')
| Login
@endsection

@section('meta')
    {{-- // --}}
@endsection

@section('header')
    {{-- // --}}
@endsection

@section('footer')
    {{-- // --}}
@endsection

@section('main.style')
    {{-- // --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main.script')
    {{-- // --}}
@endsection

@section('content')
    {{-- <x-navbar-component /> --}}
    <div class="container g-5 ">
        <div class="row  ">
            <div class="col-lg-6 col-md-6  ">
                <div class=" logo-login text-center   ">
                    <img width="500em" src="img/Modern.png" alt="logo">
                </div>
                <div class="con text-center ">
                    <h3 class="h3">Welcome To </h3>
                    <h5 class="h5"></h5>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center mt-5 pt-5  ">
                <div class="fram  rounded-4  w-75  ">
                    <i class="fa-solid fa-graduation-cap  fs-2 ps-3 pt-1 pe-2  h-25 mt-5 "></i>
                    <h2 class="d-inline me-3">lOG IN</h2>
                    <div class="con-fram p-5  rounded-4  h-50 ">
                        <form action="{{ route('request.login') }}" method="POST" id="loginForm" >
                            @csrf
                            <label for="email">
                                <h5>Email/ID</h5>
                            </label> <br>
                            <input class=" form-control " type="email" name="email" id="email"
                                placeholder="Example@gmail.com"> <br> <br>
                            <label for="password">
                                <h5>Password</h5>
                            </label> <br>
                            <input class=" form-control " type="password" name="password" id="password"
                                placeholder="**********"> <br>
                            <input class="  " type="checkbox" name="education" value="graduated" placeholder="checkbox">
                            <h6 class="pt-2 d-inline">remember username</h6> <br> <br> <br>
                            <button type="submit" class="btn d-flex  m-auto">
                                <h4 class="m-auto d-inline" id> Log in</h4>
                            </button> <br />
                            <a href="{{ route('register-page') }}" type="button" class=" btn btn1 d-flex  m-auto">
                                <h4 class="m-auto d-inline" id> Register</h4>
                            </a> <br />

                            @error('identifier')
                                {{ $message }}
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
