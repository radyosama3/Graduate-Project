@extends('structure')

@section('pageName')
| About
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
    <link rel="stylesheet" href="{{ asset('css/about us.css') }}">
@endsection

@section('main.script')
    {{-- // --}}
@endsection

@section('content')
    <x-navbar-component />
    <div class="container">
        <h1>About Us </h1>
        <p>Welcome to Your Learning Management System (LMS), where we are dedicated to providing a robust online learning experience for students, educators, and professionals.</p>

        <h2>Our Mission</h2>
        <p>Our mission is to make quality education accessible to everyone, anywhere, at any time. We strive to create an engaging and interactive platform that caters to diverse learning needs and styles.</p>

        <h2>Our Vision</h2>
        <p>Our vision is to empower individuals to pursue their educational goals and unlock their full potential. We aspire to build a global community of lifelong learners who thrive in the digital age.</p>

        <h2>Why Choose Us?</h2>
        <ul>
            <li>Comprehensive Learning Resources</li>
            <li>Interactive Learning Experience</li>
            <li>Flexible Learning Options</li>
            <li>Expert Instructors</li>
            <li>Community Support</li>
            <li>Continuous Improvement</li>
        </ul>

        <h2>Our Team</h2>
        <p>Behind Your Learning Management System is a dedicated team of professionals passionate about education, technology, and innovation. Meet our team of developers, designers, educators, and support staff.</p>

        <h2>Contact Us</h2>
        <p>We value your feedback and inquiries. Please feel free to contact us at <a href="mailto:info@yourlms.com">test@gmail.com</a> with any questions or suggestions.</p>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
