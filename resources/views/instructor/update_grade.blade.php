@extends('structure')

@section('pageName')
| add grade
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('../../css/courses.css') }}">
@endsection

@section('main.script')
    {{-- <script src="{{ asset('../../js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../../js/courses.js') }}"></script> --}}
@endsection

<x-navbar-component />
@section('content')

<div class="container">
    <h2>Add Grade</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('store-grade') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Course:</label>
            <select class="form-control" id="course_id" name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Student:</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="grade">Grade:</label>
            <input type="number" class="form-control" id="grade" name="grade" step="0.01" min="0" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Grade</button>
    </form>

    {{-- <div class="container-fluid">
        <div class="row1 bg-danger">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="home-sec">
                    <img src="img/Rectangle 4.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <h1 class="p-2 text-center" id="courses">Our Courses</h1>
    @php
        $dir = 'rtl';
    @endphp
    @foreach ($courses as $item)
        @if($dir == 'rtl')
            @php
                $dir = 'ltr';
            @endphp
        @else
            @php
                $dir = 'rtl';
            @endphp
        @endif

        <section class="courses p-2">
            <div class="container ">
                <div class="row d-flex " dir="{{ $dir }}">
                    <div class=" hover col-lg-6 col-md-12 col-sm-12 position-relative">
                        <img src="img/Rectangle 11.png" alt="">
                        <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                            <a href="{{route('course-show-page',$item->course->id) }}">
                                <button class=" btn  text-center h-25 "> course details</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center m-auto offset-2">
                        <h2 class="py-3 ">@if($item->course){{$item->course->name }} @endif </h2>

                        {{-- <h2 class="py-3 ">{{$item->course->name}} </h2> --}}
{{--
                        <h5 class="" dir="ltr">
                            @if($item->course){{ Str::limit($item->course->description, $limit = 100, $end = '...') }}@endif
                        </h5>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <div class="div">
        <i class="fa-solid fa-arrow-up" onclick="top()"></i>
        <span class="UP">UP</span>
    </div> --}}

@endsection
