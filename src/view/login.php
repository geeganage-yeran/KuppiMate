<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/login.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>KuppiMate</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><img class="navImg ms-4" src="/KuppiMate/public/images/logo.png" alt=""></a>
            <div class="d-flex">
                <button class="btn btn-outline-primary fw-bold me-2" type="submit" onclick="document.location='/KuppiMate/src/view/index.php'"><i class="bi bi-chevron-left me-2"></i>Back</button>
                <button class="btn btn-primary fw-bold me-2" type="submit" onclick="document.location='/KuppiMate/src/view/index.php'">Register</button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-3  leftText  d-md-block mt-5">
                <h1>Login to</h1>
                <h2>KuppiMate</h2>
                <p>If you don't have an account</br>you can <a href="/KuppiMate/src/view/index.php">Register Here!</a></p>
            </div>
            <div class="col-lg-4 p-3 d-none d-lg-block mt-5 moving">
                <img src="/KuppiMate/public/images/login-laptop.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-4 p-5">
                <div class="profileImg">
                    <img src="/KuppiMate/public/images/profile.png" class="rounded-circle" alt="">
                </div>
                <form action="/KuppiMate/src/controller/loginController.php" method="POST">
                    <div class="mb-3 mt-5">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <a href="/KuppiMate/src/view/recovery_password.php"><span class="d-block mt-1">Forgotten Your Password?</span></a>
                    </div>
                    <div class="g-recaptcha mb-2" data-sitekey="6LeNWmUqAAAAADsueyvXOs44jY93PJY6KSdRxqrC" data-callback="enableSubmit2" ></div>
                    <div class="mb-3 mt-4">
                        <input type="submit" class="form-control p-2" value="Login">
                    </div>
                    <?php
                    if (isset($_GET['s'])) {
                        if ($_GET['s'] == '3') {
                            echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Username or password incorrect!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        } elseif ($_GET['s'] == '4') {
                            echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    You are not a registerd User Please register !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        }elseif ($_GET['s'] == '5') {
                            echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    reCAPTCHA verification failed. Please try again !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Successfully -->
    <?php
    if (isset($_GET['s'])) {
        if ($_GET['s'] == '1') {
            echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Registration Success!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
        }
    }
    ?>

    <footer class="pt-3 pb-1">
        <p class="text-center">&copy;Copyright 2024 - KuppiMate - All Rights Reserved</p>
    </footer>
    <script src="/KuppiMate/public/js/index.js?v=<?php echo time(); ?>"></script>
</body>

</html>