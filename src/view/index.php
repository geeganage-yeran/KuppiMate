<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/index.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>KuppiMate</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><img class="navImg ms-4" src="/KuppiMate/public/images/logo.png" alt=""></a>
            <div class="d-flex">
                <button class="btn btn-outline-primary fw-bold me-2" type="submit">Login</button>
                <button class="btn btn-primary fw-bold me-2" type="submit">Register</button>
            </div>
        </div>
    </nav>
    <div class="container2">
        <div class="landText mt-4">
            <h1>KuppiMate</h1>
            <h2>Digital Plaform<br>For Traditional<br>Kuppis</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <button class="btn btn-primary fw-bold me-2" type="submit">Register</button>
            <button class="btn btn-outline-primary fw-bold me-2" type="submit">Login</button>
        </div>
        <div class="landImage">
            <img src="/KuppiMate/public/images/landing.png" alt="">
        </div>
    </div>
    <hr class="mt-5">
    <div class="container-fluid d-flex introduction p-4">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/KuppiMate/public/images/login_500x460.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
                <h4 class="fs-3 fw-bold mt-3">What is KuppiMate ?</h4>
                <p>Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.
                </p>
                <p>Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.Courses covering all tech domains for you to learn and explore new oppurtunities. Learn from Industry Experts and land your Dream Job.
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal">Contact Us</button>
                </p>
            </div>
        </div>
    </div>
    <footer class="pt-3 pb-1">
        <p class="text-center">&copy;Copyright 2024 - KuppiMate - All Rights Reserved</p>
    </footer>
    <!-- Modal pop up contact us -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="d-flex flex-column mb-2">
                            <div class="p-3">
                                <i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;&nbsp;
                                <span id="email">kuppimate@gmail.com<span>
                                <i onclick="copyText()" style="cursor: pointer;" class="bi bi-copy ms-4"></i>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-2">
                            <div class="p-3">
                                <i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;&nbsp;+94 71 061 9833
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-2">
                            <div class="p-3">
                                <i class="bi bi-house-fill"></i>&nbsp;&nbsp;&nbsp;Badulla, Srilanka
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyText() {
            var email = document.getElementById("email");
            var emailContent=email.innerText;
            navigator.clipboard.writeText(emailContent);
        }
    </script>
</body>

</html>