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
        @include('errors')
        @include('success')
            <br>
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
@endphp

@foreach ($course->lectures as $key => $value)
    @if ($value['is_active'] == 1)
        @php
            $edit = route('instrutor_addlec', $value['id']); // Adjust the route as needed
            $deleteLink = route('deletelec', $value['id']);
            $mediaFiles = json_decode($value['media'], true); // Decode the JSON string to an array
        @endphp
        <div class="custom-div" style="margin-bottom: 10px;">
            <h4>Lecture {{ $i }} : {{ $value['title'] }}</h4>
            <h4>Description : {{ $value['description'] }}</h4>
            <h6>Module {{ $i }} / {{ $lectures_count }} </h6>

            {{-- Display Media Links --}}
            @if (!empty($mediaFiles))
                <div class="media-links">
                    @foreach ($mediaFiles as $file)
                        @php
                            $fileUrl = asset('storage/' . $file); // Generate the correct URL for each media file
                            $fileName = basename($file); // Extract the file name from the path
                        @endphp
                        <a href="{{ $fileUrl }}" target="_blank" style="display: block; margin-bottom: 5px;">View Media</a>
                    @endforeach
                </div>
            @endif

            <div style="display: flex; gap: 10px;">
                <a href="{{ $edit }}" class="icon fa-solid fa-upload" style="display: inline-block; padding: 10px; text-decoration: none; color: rgb(0, 0, 0); border-radius: 5px; text-align: center;">Edit</a>
                <form action="{{ $deleteLink }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon fa-solid fa-trash"
                            style="display: inline-block; padding: 10px; text-decoration: none;
                                   color: rgb(0, 0, 0); border-radius: 5px; text-align: center;
                                   background: none; border: none; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this lecture ?');">
                        Delete
                    </button>
                </form>
            </div>
        </div><br>
        @php $i++; @endphp
    @endif
@endforeach


         <form action="{{route('uploadquiz',$course->id)}}" method="GET">
            <button type="submit" class="btn d-flex  m-auto">
                <h4>Add Quiz</h4>
            </button>
        </form>
        {{--  --}}
        <form action="{{route('instrutor_addlecture',$course->id)}}" method="GET">
            <button type="submit" class="btn d-flex  m-auto">
                <h4>Add new lecture</h4>
            </button>
        </form>


    {{-- <button   type="submit" id="add_quize" onclick="redirectToWebsite1()" class="btn d-flex  m-auto" ><h4 class="m-auto d-inline" id>Add Quize</h4></button>
    <button   type="submit" id="add_lectrue " href="{{return view('instructor.uploadForm')}}" onclick="redirectToWebsite1()" class="btn d-flex  m-auto" ><h4 class="m-auto d-inline" id>Add new lecture </h4></button> <br/> --}}

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
