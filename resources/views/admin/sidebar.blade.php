
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li>
                <a href="{{route('adduser')}}">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('allusers')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">all users </span>
                </a>
            </li>

            {{-- <li>
                <a href="{{route('editusers')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">users </span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('addcourse')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Add Courses </span>
                </a>
            </li>
            <li>
                <a href="{{route('allcourses')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title"> All Courses </span>
                </a>
            </li>
            <li>
                <a href="{{route('assincourse')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Assign Course </span>
                </a>
            </li>
            <li>
                <a href="{{route('addlec')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Add Lectures </span>
                </a>
            </li>
            <li>
                <a href="{{ route('request.logout') }}">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
