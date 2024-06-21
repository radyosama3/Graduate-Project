@extends('structure')

@section('pageName')
| Profile
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
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('main.script')
    {{-- // --}}
@endsection

@section('content')
    <x-navbar-component />
    <div class="container-fluid s  ">
        <div class="row ">
            <div class="col-lg-1  ">
                <div class="img-info ">
                    @if ($profile->image)
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="User Image" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    @else
                        <img src="img/Ellipse 3.png" alt>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-center ms-5 ">
                <div class="      ">
                    <h2>Name : {{ $profile->name }}</h2>
                    <h2>User id : {{ $profile->user_id }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  border-2 mt-3">
        <form action class="form p-3 ">

            <div class="row p-3 ">

                <div class="col-lg-5 bg-white ms-5 ">
                    <h3>Personal details</h3><br>
                    <label for="id">
                        <h4>Name:</h4>
                    </label>
                    <h5 class="id"> {{ $profile->name }}</h5><br>
                    <label for="Email">
                        <h4>Email</h4>
                    </label>
                    <h5 class="Email">{{ $profile->email }}</h5><br>
                    <label for="type">
                        <h4>type:</h4>
                    </label>
                    <h5 class="Email">{{ $profile->type }}</h5><br>
                    <label for="level">
                        <h4>level:</h4>
                    </label>
                    <h5 class="level">level {{ $profile->level }}</h5>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 bg-white ">
                    <h3>Class of details</h3><br>
                    <label for="id">
                        <h4>Class room:</h4>
                    </label>
                    <h5 class="id"> class:{{ $profile->class_room }}</h5><br>
                    <label for="Email">
                        <h4>date of entry:</h4>
                    </label>
                    <h5 class="Email">{{ $profile->created_at->format('F d, Y h:i A') }}</h5><br>
                    <label for="level">
                        <h4>Number</h4>
                    </label>
                    <h5 class="level">{{ $profile->number }}</h5>
                </div>
            </div>
        </form>

    </div>
    {{-- <x-footer-component /> --}}
@endsection
