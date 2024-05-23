<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/doctor.css">
</head>
<body>
    <div class="header d-flex justify-content-end ">

        <h4 class="p-2">doctor</h4>
        <i class="fa-solid fa-chalkboard-user  p-3"></i>
    </div>
    <nav>
        <div class="navbar mb-3  ps-4">

            <header >
                <div class="container-fluid  con">
                    <div class="row">
                        <div class="col-xl-4 d-flex text-center">
                            <img  src="../../img/4 2.png" alt="">
                            <h2>The Mastery Mind College </h2>
                        </div>
                        <div class="col-xl-8 d-flex justify-content-center  ">

                            <nav class="navbar navbar-expand-lg  ">

                                <div class="container  ">
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav   ">
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="courses.html"><h4>Courses</h4></a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="#" > <h4>Grades</h4></a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="profile.html"> <h4>profile</h4></a>
                            </li>  <li class="nav-item pe-5">
                                <a class="nav-link" href="about.html"> <h4>AboutUs</h4></a>
                            </li>  <li class="nav-item pe-5">
                                <a class="nav-link" href="#"> <h4>ContactUs</h4></a>
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

    <div class="container">
        <h2>UpLoad</h2>
        <form id="assignmentForm">
            <label for="title">Assignment Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="dueDate" required>

            <label for="file">Attach File:</label>
            <input type="file" id="file" name="file" accept=".pdf,.doc,.docx" required>

            <input type="submit" value="Uploud Assignment">
        </form>
    </div>
</body>
</html>