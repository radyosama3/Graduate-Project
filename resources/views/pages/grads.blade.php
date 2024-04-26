@extends('structure')

@section('pageName')
| Grads
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
    <link rel="stylesheet" href="{{ asset('css/grades.css') }}">
@endsection

@section('main.script')
    {{-- // --}}
@endsection

@section('content')
    <x-navbar-component />
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h1>Our Courses</h1>
            </div>
            <div class="col-md-4 ps-5 ">
                <h1>Grades</h1>
            </div>
        </div>
        <div class="container">
            <h1 class="mt-5 mb-4 text-center"></h1>
            <table class="table table-bordered table-info m ">
                <thead>
                </thead>
                <tbody>
                    @foreach ($grads as $item)
                    <tr>
                        <td>{{ $item->course->name }}</td>
                        <td>{{ $item->grade }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
