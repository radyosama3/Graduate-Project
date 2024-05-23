@extends('structure')

@section('pageName')
    | Course Details - {{ $course->name }}
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
    <link rel="stylesheet" href="{{ asset('css/embedded.css') }}">

    {{-- <link rel="stylesheet" href="{{asset('../../css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../../css/all.min.css')}}"> --}}




@endsection

@section('main.script')
    {{-- // --}}
@endsection

@section('content')
    <x-navbar-component />
    <div class="container-fluid ps-5 pt-3 s">
        <div class="row">
            <div class="col-lg-12">
                <h3>Course Name : {{ $course->name }}</h3>
                <h5>
                    {{ $course->description }}
                </h5>
            </div>
        </div><br>
    </div>
    @php
        $lectures_count = count($course->lectures);
        $i = 1;
        foreach ($course->lectures as $key => $value) {

            echo '
            <div class="custom-div">
                <h4>Lecture '.$i.' : '.$value['title'].'</h4>
                <h6>Module '.$i.'\\'.$lectures_count .' complete</h6>
                <i class="icon fa-solid fa-upload d-flex justify-content-end" >u p load</i>
            </div><br>
            ';
            $i++;
        }
    @endphp --}}
    {{-- @foreach ($course->lectures as $item)
        <div class="custom-div">
            <h4>Lecture 1 : {{ $item->title }}</h4>
            <h6>module 1. 10\13 complete</h6>
        </div><br>
    @endforeach --}}
    {{-- <x-footer-component /> --}}
    {{-- <button   type="submit" id="add_quize" onclick="redirectToWebsite1()" class="btn d-flex  m-auto" ><h4 class="m-auto d-inline" id>Add Quize</h4></button> <br/>
      <script src="../../js/upload.js"></script>
@endsection
--}}