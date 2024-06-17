<div class="header d-flex justify-content-end ">
    {{-- <i><i class="fa-regular fa-bell p-4 "></i></i> --}}
    <h4 class="p-3"> <a href="{{ route('request.logout') }}" class="btn btn-logout">Logout</a></h4>
    <h4 class="p-3">{{ $auth->name }}</h4>
    <div class="icon">
        @if ($auth->image)
        <img src="{{ asset('storage/' . $auth->image) }}" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
        @else
            <img src="../img/Ellipse 2.png" alt>
        @endif
    </div>
</div>
<nav>
    <div class="navbar pt-5  ps-5">
        <header>
            <div class="container ">
                <div class="row">
                    <div class="col-xl-4 d-flex text-center">
                        <img width="140" src="../img/Modern.png " alt="">
                        <h2 class="h2">Modern Academy </h2>
                    </div>
                    <div class="col-xl-8 d-flex justify-content-center  ">
                        <nav class="navbar navbar-expand-lg  ">
                            <div class="container ps-5  ">
                                <div class="collapse navbar-collapse  ps-5" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        @if (Auth::check() && Auth::user()->type == 'student')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('courses-page') }}">
                                                <h4>Courses</h4>
                                            </a>
                                        </li>
                                        @elseif (Auth::check() && Auth::user()->type == 'instructor')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('instructor-courses-page') }}">
                                                <h4>Courses</h4>
                                            </a>
                                        </li>
                                        @endif
                                        @if (Auth::check() && Auth::user()->type == 'student')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('grads-page') }}">
                                                <h4>Grades</h4>
                                            </a>
                                        </li>
                                        @elseif (Auth::check() && Auth::user()->type == 'instructor')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('instructor_grade') }}">
                                                <h4>Grades</h4>
                                            </a>
                                        </li>
                                        @endif

                                        @if (Auth::check() && Auth::user()->type == 'student')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('profile-page') }}">
                                                <h4>Profile</h4>
                                            </a>
                                        </li>
                                        @elseif (Auth::check() && Auth::user()->type == 'instructor')
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('instructor-profile-page') }}">
                                                <h4>Profile</h4>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('about-page') }}">
                                                <h4>AboutUs</h4>
                                            </a>
                                        </li>
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('contact-page') }}">
                                                <h4>ContactUs</h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
</nav>
