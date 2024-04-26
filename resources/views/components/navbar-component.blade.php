<div class="header d-flex justify-content-end ">
    <i><i class="fa-regular fa-bell p-4 "></i></i>
    <h4 class="p-3"> <a href="{{ route('request.logout') }}">logout</a></h4>
    <h4 class="p-3">{{ $auth->name }}</h4>
    <div class="icon">
        @if ($auth->thumbnail)
            <img src="{{ $auth->thumbnail }}" alt="user thumbnail">
        @else
            <img src="img/Ellipse 2.png" alt>
        @endif
    </div>
</div>
<nav>
    <div class="navbar pt-5  ps-5">
        <header>
            <div class="container ">
                <div class="row">
                    <div class="col-xl-4 d-flex text-center">
                        <img width="140" src="img/Modern.png " alt="">
                        <h2 class="h2">Modern Academy </h2>
                    </div>
                    <div class="col-xl-8 d-flex justify-content-center  ">
                        <nav class="navbar navbar-expand-lg  ">
                            <div class="container ps-5  ">
                                <div class="collapse navbar-collapse  ps-5" id="navbarSupportedContent">
                                    <ul class="navbar-nav   ">
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('courses-page') }}">
                                                <h4>Courses</h4>
                                            </a>
                                        </li>
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('grads-page') }}">
                                                <h4>Grades</h4>
                                            </a>
                                        </li>
                                        <li class="nav-item ps-5">
                                            <a class="nav-link" href="{{ route('profile-page') }}">
                                                <h4>Profile</h4>
                                            </a>
                                        </li>
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