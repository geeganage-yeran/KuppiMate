<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/verification.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pending verification</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center align-items-center">
            <div class="col-lg-6">
                <img src="/KuppiMate/public/images/verification.png" class="img-fluid" alt="verification-image">
            </div>
            <div class="col-lg-6">
                <div class="text-center mt-5">
                    <h1>Your Account is pending verification</h1>
                    <h3>We will let you in soon!</h3>
                    <p>Verification process will complete within 24 hours</p>
                    <button onclick="document.location='/KuppiMate/src/view/index.php'" type="button" class="btn btn-primary mt-3">Back to Home</button>
                </div>
            </div>
        </div>

    </div>
</body>

</html>