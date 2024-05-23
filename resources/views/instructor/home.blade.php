@extends('structure')

@section('pageName')
| insturtor Courses
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
    <link rel="stylesheet" href="{{ asset('../css/courses.css') }}">
@endsection

@section('main.script')
    <script src="{{ asset('../js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../js/courses.js') }}"></script>
@endsection

@section('content')
    <x-navbar-component />
    <div class="container-fluid">
        <div class="row1 bg-danger">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="home-sec">
                    <img src="../img/Rectangle 4.png" alt="">
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
                        <img src="../img/Rectangle 11.png" alt="">
                        <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                            <a href="{{ route('instructor-ShowCourse',$item->course->id) }}">
                                <button class=" btn  text-center h-25 "> course details</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center m-auto offset-2">
                        <h2 class="py-3 ">@if($item->course){{$item->course->name }} @endif </h2>

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
    </div>
    {{-- <section class="courses p-2">
        <div class="container ">
            <div class="row d-flex">
                <div class=" hover col-lg-6 col-md-12 col-sm-12 position-relative">
                    <img src="img/Rectangle 11.png" alt="">
                    <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                        <a href="{{ route('course-show-page',$id) }}">
                            <button class=" btn  text-center h-25 "> course details</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center m-auto offset-2  ">
                    <h2 class="py-3 ">Embedded System </h2>
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, distinctio?</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5 ">
            <div class="row">
                <div class="col-lg-6 text-center m-auto">
                    <h2 class="py-3">Image Processing </h2>
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, distinctio?</h5>
                </div>
                <div class="hover col-lg-6 position-relative">
                    <img src="img/Rectangle 11.png" alt="">
                    <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                        <a href="Image-Processing.html">
                            <button class="btn text-center h-25"> course details</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="courses p-2">
        <div class="container ">
            <div class=" hover row d-flex position-relative">
                <div class="col-lg-6   col-md-12 col-sm-12">
                    <img src="img/Rectangle 11.png" alt="">
                    <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                        <a href="computer-network.html">
                            <button class=" btn  text-center h-25 ">course details</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center m-auto offset-2  ">
                    <h2 class="py-3 ">Computer Network</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, distinctio?</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5 ">
            <div class="hover row position-relative">
                <div class="col-lg-6 text-center m-auto">
                    <h2 class="py-3 ">Genitic Algorithm</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, distinctio?</h5>
                </div>
                <div class="col-lg-6   ">
                    <img src="img/Rectangle 11.png" alt="">
                    <div class="hover-img text-center d-flex align-content-center justify-content-center ">
                        <a href="{{ route('genitic-algorithm-page') }}">
                            <button class=" btn  text-center h-25 "> course details</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="div">
            <i class="fa-solid fa-arrow-up" onclick="top()"></i>
            <span class="UP">UP</span>
        </div>
    </section> --}}
    {{-- <x-footer-component /> --}}
@endsection
