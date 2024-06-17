@extends('structure')

@section('pageName')
| Contact
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
    <link rel="stylesheet" href="{{asset('../../css/contact us.css')}}">
@endsection

@section('main.script')

@endsection

@section('content')
    <x-navbar-component />
    <section id="contact-us">
        <div class="container">
            <div class="head">
                <h2>Join Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="con-info">
                        <h3><strong>CONTACT INFO</strong></h3>
                        <p>Why you should hire me writeup Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque nascetur ridiculus mus.
                        </p>
                        <div class="icons">
                            <p><i class="fa fa-map-marker"></i> New Street 22545, Nexa Road, New York City, USA</p>

                            <p class="red"><i class="fa fa-envelope"></i> https://www.modern-academy.edu.eg/</p>
                            <p><i class="fa fa-phone "></i> 001-000-000-000</p>
                        </div>
                        <div class="social-list">
                            <i class="fab fa-twitter fa-fw"></i>
                            <i class="fab fa-facebook-f fa-fw"></i>
                            <i class="fab fa-instagram fa-fw"></i>
                            <i class="fab fa-dribbble fa-fw"></i>
                            <i class="fab fa-pinterest fa-fw"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form>
                        <input class="form-control input-lg" type="text" placeholder="Enter Name">
                        <input class="form-control input-lg" type="email" placeholder="Enter Email">
                        <textarea class="form-control input-lg" placeholder="Enter Message"></textarea>
                        <span id="chars">100</span> Characyer Reamining
                        <button type="submit" class="btn"> Send Message </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- <x-footer-component /> --}}
@endsection
