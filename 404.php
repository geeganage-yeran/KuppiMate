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
            width: 20%;
        }

        .error-page {
            width: 100vw;
            margin: auto;
            text-align: center;
            margin-top: 20px;
        }

        h5,
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

        .shake-horizontal {
            -webkit-animation: shake-horizontal 0.8s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
            animation: shake-horizontal 0.8s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
        }

        @-webkit-keyframes shake-horizontal {

            0%,
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70% {
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px);
            }

            20%,
            40%,
            60% {
                -webkit-transform: translateX(10px);
                transform: translateX(10px);
            }

            80% {
                -webkit-transform: translateX(8px);
                transform: translateX(8px);
            }

            90% {
                -webkit-transform: translateX(-8px);
                transform: translateX(-8px);
            }
        }

        @keyframes shake-horizontal {

            0%,
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70% {
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px);
            }

            20%,
            40%,
            60% {
                -webkit-transform: translateX(10px);
                transform: translateX(10px);
            }

            80% {
                -webkit-transform: translateX(8px);
                transform: translateX(8px);
            }

            90% {
                -webkit-transform: translateX(-8px);
                transform: translateX(-8px);
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <img src="/KuppiMate/public/images/404.png" class="img-fluid" alt="404">
        <h4 class="mt-2">PAGE NOT FOUND</h4>
        <h5 class="mt-3">Sorry, the page you are looking for does not exist.</h5>
        <a href="/KuppiMate/src/view/index.php"><button type="button" class="shake-horizontal btn btn-primary mt-3">Go to Homepage</button></a>
    </div>
</body>

</html>