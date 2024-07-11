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
                <button class="btn btn-primary fw-bold me-2" type="submit" data-bs-toggle="modal" href="#registerModal">Register</button>
            </div>
        </div>
    </nav>
    <div class="container2">
        <div class="landText mt-4">
            <h1>KuppiMate</h1>
            <h2>Digital Plaform<br>For Traditional<br>Kuppis</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <button class="btn btn-primary fw-bold me-2" type="submit" data-bs-toggle="modal" href="#registerModal">Register</button>
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
                <img src="/KuppiMate/public/images/login-laptop.png" class="img-fluid" alt="">
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
    <!-- First Modal registration selection -->
    <div class="modal fade modal1" id="registerModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center modal1Body">
                    <button class="btn user-selection me-5" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <img src="\KuppiMate\public\images\undergraduate.png" class="mb-2" width="110px"><br />Undergraduate
                    </button>
                    <button class="btn user-selection" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <img src="\KuppiMate\public\images\externalLearner.png" class="mb-2" width="80px"><br />External Learner
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Modal ug-registration -->
    <div class="modal fade modal2" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn btn-primary me-2 back" data-bs-target="#registerModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-chevron-left me-2"></i>Back</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Register To KuppiMate</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/KuppiMate/public/images/login-laptop.png" class="img-fluid mt-5">
                        </div>
                        <div class="col-md-6 p-4">
                            <form action="/KuppiMate/src/controller/ugController.php" method="POST" enctype="multipart/form-data" onsubmit="return formValidate()">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="fName" id="fName" placeholder="First Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="lName" id="lName" placeholder="Last Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="contact" placeholder="contact" required id="contact">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Repeat Password" required>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="university" aria-label="Default select example">
                                        <option>Please Select Your University</option>
                                        <option value="Uva Wellassa University">Uva Wellassa University</option>
                                        <option value="University of Colombo">University of Colombo</option>
                                        <option value="University of Peradeniya">University of Peradeniya</option>
                                        <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                                        <option value="University of Kelaniya">University of Kelaniya</option>
                                        <option value="University of Moratuwa">University of Moratuwa</option>
                                        <option value="University of Jaffna">University of Jaffna</option>
                                        <option value="University of Ruhuna">University of Ruhuna</option>
                                        <option value="Eastern University, Sri Lanka">Eastern University, Sri Lanka</option>
                                        <option value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                                        <option value="Rajarata University of Sri Lanka">Rajarata University of Sri Lanka</option>
                                        <option value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                                        <option value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                                        <option value="University of the Visual and Performing Arts">University of the Visual and Performing Arts</option>
                                        <option value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of Indigenous Medicine</option>
                                        <option value="University of Vavuniya">University of Vavuniya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="verficationDoc" required>
                                    <label class="veri-desc">For the verification process please upload a valid verification <span data-bs-toggle="popover" data-bs-content="You can upload a clear photo of your university ID or any valid document for verification.">document</span></label>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="form-control p-2" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Modal ex-registration -->
    <div class="modal fade modal3" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn btn-primary me-2 back" data-bs-target="#registerModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-chevron-left me-2"></i>Back</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Register To KuppiMate</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/KuppiMate/public/images/login-laptop.png" class="img-fluid mt-3">
                        </div>
                        <div class="col-md-6 p-4">
                            <form action="">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="fName" placeholder="First Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="lName" placeholder="Last Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="rpassword" placeholder="Repeat Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="form-control p-2" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/KuppiMate/public/js/index.js?v=<?php echo time(); ?>"></script>
</body>

</html>