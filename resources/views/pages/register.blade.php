@extends('structure')

@section('pageName')
| Register
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
    <link rel="stylesheet" href="{{ asset('css/rejester.css') }}">
@endsection

@section('main.script')
    <script src="{{ asset('js/Register.js') }}"></script>
@endsection

@section('content')
    {{-- <x-navbar-component /> --}}
    <div class="container">
        <form action="{{ route('request.register') }}" method="POST" class="registration-form" id="registrationForm">
            @csrf
            <h2>Register for College</h2>
            <input type="text" name="name" placeholder="Full_Name" id="name" required autocomplete="off">
            <input type="email" name="email"  placeholder="Email Address" id="email" required autocomplete="off">
            <input type="password" name="password"  placeholder="Password" id="password" required autocomplete="off">
            <input type="password" name="password_confirmation"  placeholder="Confirm_Password" id="password_confirmation" required autocomplete="off">
            <button type="submit">Register</button>
            @if ($errors->any())
                <div class="">
                    @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                </div>
            @endif
        </form>
    </div>
    <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 10 1440 280">
            <path fill=" #419197" fill-opacity="1"
                d="M0,192L60,208C120,224,240,256,360,266.7C480,277,600,267,720,240C840,213,960,171,1080,154.7C1200,139,1320,149,1380,154.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
