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
            <h6>Module {{ $i }} / {{ $lectures_count }} complete</h6>

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


        </div><br>
        @php $i++; @endphp
    @endif

@endforeach
<div style="text-align: center;">
    <a href="{{ route('quiz.redirect', ['course' => $course->id]) }}" class="icon fa-solid fa-upload" style="display: inline-block; padding: 10px; text-decoration: none; color: rgb(0, 0, 0); border-radius: 5px; text-align: center;"> Enter Into Exam </a>
</div>
@endsection
{{--
    @foreach ($course->lectures as $key => $value)
    <div class="custom-div">
        <h4>Lecture {{ $i }} : {{ $value['title'] }}</h4>
        <h6>Module {{ $i }}\{{ $lectures_count }} complete</h6>

        @php
            $mediaFiles = json_decode($value['media'], true);
        @endphp

        @if (!empty($mediaFiles))
            <div class="lecture-media">
                @foreach ($mediaFiles as $file)
                    @php
                        $filePath = storage_path('app/' . $file);
                        $fileName = basename($filePath);
                    @endphp
                    <a href="{{ route('download', ['file' => $fileName]) }}" target="_blank">{{ $fileName }}</a><br>
                @endforeach
            </div>
        @endif
    </div><br>
    @php $i++; @endphp
@endforeach
    @endphp --}}


