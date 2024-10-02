<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>404 - Page Not Found</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .img-fluid {
            width: 40%;
        }

        .error-page {
            width: 100vw;
            margin: auto;
            text-align: center;
            margin-top: 100px;
        }

        h4 {
            color: #666666;
            font-weight: 600;
        }

        .btn {
            background-color: #0B5ED7;
        }

        @media(max-width:768px) {
            .img-fluid {
                width: 60%;
            }

            h4 {
                color: #666666;
                font-weight: 600;
                font-size: medium;
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <img src="/KuppiMate/public/images/404.png" class="img-fluid" alt="404">
        <h4 class="mt-5">Sorry, the page you are looking for does not exist.</h4>
        <a href="/KuppiMate/src/view/index.php"><button type="button" class="btn btn-primary mt-3">Go to Homepage</button></a>
    </div>
</body>

</html>