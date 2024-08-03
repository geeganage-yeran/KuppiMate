<?php
include_once __DIR__ . '/../controller/createKuppi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "undergraduate") {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$fName = $_SESSION['first_name'];
$lName = $_SESSION['last_name'];
$university = $_SESSION['university'];
$contact = $_SESSION['contact'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$account_status = $_SESSION['account_status'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/ug-dashboard.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User Dashboard</title>
</head>

<body>
    <div class="sideBar" id="sidebar">
        <div class="profile">
            <h2><?php echo ucfirst(strtolower($fName)) ?></h2><i class="bi bi-x-lg" id="closeMenue"></i><br>
            <label class="fst-normal"><?php echo ucfirst(strtolower($role)) ?></label>
            <span class="badge bg-success"><?php echo ucfirst(strtolower($account_status)) ?></span>
        </div>
        <ul class="navLinks">
            <li><a href="#" onclick="showSection('home')" class="active"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="#" onclick="showSection('createKuppi')"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;&nbsp;Create a Kuppi</a></li>
            <li><a href="#" onclick="showSection('joinKuppi')"><i class="bi bi-person-workspace"></i>&nbsp;&nbsp;&nbsp;Join for a Kuppi</a></li>
            <li><a href="#" onclick="showSection('externalSession')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;External Tutor Sessions</a></li>
            <li><a href="#" onclick="showSection('paid-courses')"><i class="bi bi-cash-stack"></i>&nbsp;&nbsp;&nbsp;Paid Courses</a></li>
            <li><a href="#" onclick="showSection('my-courses')"><i class="bi bi-easel3-fill"></i>&nbsp;&nbsp;&nbsp;My Courses</a></li>
            <li><a href="#" onclick="showSection('settings')"><i class="bi bi-gear-fill"></i>&nbsp;&nbsp;&nbsp;Settings</a></li>
            <li><a href="/KuppiMate/src/controller/logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
        </ul>
    </div>
    <div class="mainContainer">
        <header>
            <div class="ham" id="hambMenu">
                <i class="bi bi-list"></i>
            </div>
            <h1 id="header-title"></h1>
            <img src="/KuppiMate/public/images/logo.png" alt="Logo">
        </header>
        <section class="content" id="home">
            <div class="headerImage">
                <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
            </div>
            <div class="container homecont">
                <div class="row gx-3">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-workspace"></i>
                            <p class="homecont-p">How to join for a Kuppi</p>
                            <p>Just click on the Join for a kuppi and you can join for any Kuppi session in Sri Lanka government universities</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-people-fill"></i>
                            <p class="homecont-p">How to schedule a Kuppi</p>
                            <p>Just click on the Join for a kuppi and you can join for any Kuppi session in Sri Lanka government universities</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-lines-fill"></i>
                            <p class="homecont-p">About external session</p>
                            <p>Just click on the Join for a kuppi and you can join for any Kuppi session in Sri Lanka government universities</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-video3"></i>
                            <p class="homecont-p">Join for an external session</p>
                            <p>Just click on the Join for a kuppi and you can join for any Kuppi session in Sri Lanka government universities</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-question-lg"></i>
                            <p class="homecont-p">Any questions</p>
                            <p>Just click on the Join for a kuppi and you can join for any Kuppi session in Sri Lanka government universities</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="createKuppi">
            <div class="headerImage">
                <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
            </div>
            <!--message display section-->
            <?php
            if (isset($_GET['id'])) {
                if ($_GET['id'] == '1') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    canot use special characters in title and description except dash,underscore
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '3') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Session Created Successfully check the bottom of the page
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '7') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Uploaded the File Successfully For the session 
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '8') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Deleted the Session Successfully
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                }
            }
            ?>
            <!--message display section end-->
            <form action="/KuppiMate/src/controller/createKuppi.php" method="POST">
                <div class="createKuppiContainer">
                    <div id="createKuppiHeading">Schedule your Kuppi Session</div>
                    <div id="CreateKuppiTitle">
                        <label>Session Title</label><br>
                        <input type="text" name="tName" required autocomplete="off">
                    </div>
                    <div id="CreateKuppiFrom">
                        <label>Time and Date</label><br>
                        <input class="Kdate Kuppifrom" type="datetime-local" name="startDate" required>
                        <label>to</label>
                        <input class="Kdate Kuppito" type="datetime-local" name="endDate" required>
                    </div>
                    <div id="selectCategory">
                        <label>Session Category</label><br>
                        <select name="category" id="category" required>
                            <option value="accounting">Accounting</option>
                            <option value="agriculture">Agriculture</option>
                            <option value="architecture">Architecture</option>
                            <option value="biotechnology">Biotechnology</option>
                            <option value="business_administration">Business_Administration</option>
                            <option value="civil_engineering">Civil_Engineering</option>
                            <option value="computer_science">Computer_Science</option>
                            <option value="economics">Economics</option>
                            <option value="education">Education</option>
                            <option value="electrical_engineering">Electrical_Engineering</option>
                            <option value="english">English</option>
                            <option value="environmental_science">Environmental_Science</option>
                            <option value="finance">Finance</option>
                            <option value="information_technology">Information_Technology</option>
                            <option value="law">Law</option>
                            <option value="marketing">Marketing</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="mechanical_engineering">Mechanical_Engineering</option>
                            <option value="medicine">Medicine</option>
                            <option value="nursing">Nursing</option>
                            <option value="pharmacy">Pharmacy</option>
                            <option value="physics">Physics</option>
                            <option value="psychology">Psychology</option>
                            <option value="software_engineering">Software_Engineering</option>
                            <option value="statistics">Statistics</option>
                        </select>
                    </div>
                    <div class="textArea">
                        <label class="maxChar">Session Description</label><br>
                        <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                    </div>
                    <div id="CreateSection">
                        <button type="reset">Cancle</button>
                        <button type="submit">Create Kuppi</button>
                    </div>
            </form>
            <div id="kuppiResultsection">
                <?php if ($output != null) { ?>
                    <?php foreach ($output as $index => $output) { ?>
                        <div>
                            <label class="blocks"><?php echo $output['title']  ?></label>
                            <br />
                            <label class="Bvalue"><?php echo $output['description']  ?></label>
                            <br />
                            <label class="blocks">Start Date/Time :&nbsp; </label>
                            <label class="Bvalue"><?php echo $output['session_start_date_time']  ?></label>
                            <br />
                            <label class="blocks">End Date/Time :&nbsp; </label>
                            <label class="Bvalue"><?php echo $output['session_end_date_time']  ?></label>
                            <br />
                            <label class="blocks">Approval Status :&nbsp;</label>
                            <label class="Bvalue <?php echo ($output['status'] == 'approved') ? 'text-success' : 'text-danger'; ?>"><?php echo $output['status']  ?></label><br>
                            <label class="blocks">Session Link :&nbsp; </label>
                            <label class="Bvalue fw-bold"><?php echo $output['session_link']  ?></label><br>
                            <form action="/KuppiMate/src/controller/materialController.php" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="sessionId" value="<?php echo $output['id']; ?>">
                                <input class="Bvalue" type="file" accept=".zip,.rar" name="kuppiMaterials" <?php echo ($output['status'] == 'pending') ? 'disabled' : ''; ?> required>
                                <button class="material_upload" type="submit" <?php echo ($output['status'] == 'pending') ? 'disabled' : ''; ?>>Upload Kuppi Materials</button>
                                <br />
                            </form>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Delete Session</button>
                            <button onclick="window.open('<?php echo $output['session_link']  ?>', '_blank');" class="btn btn-outline-success ps-4 pe-4" <?php echo ($output['status'] == 'pending') ? 'disabled' : ''; ?>>start</button>
                            <p>Approval process will complete within few minutes (Note : Only .Zip .Rar files are allowed to Upload)</p>
                        </div>
                    <?php }; ?>
                <?php  } else { ?>
                    <span class="badge bg-secondary">No Session Created Yet</span>
                <?php } ?>


            </div>
    </div>
    </section>
    <section class="content" id="joinKuppi">
        <div class="headerImage">
            <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
        </div>
        <div id="joinHeader">
            <h4>Upcomming Kuppi Sessions</h4>
        </div>
        <hr>
        <div class="filter-category">
            <form action="#">
                <label>Filter By Category:</label>
                <select id="category-select">
                    <option value="all">All</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <option value="category3">Category 3</option>
                </select>
                <label id="date-filter">Filter By Date:</label>
                <input type="date" class="Kdate Kuppifrom" id="dateFilter">
                <button class="btn btn-primary btn-sm" id="clearButton">Clear All</button>
                <input type="submit" class="btn btn-primary btn-sm" value="Filter">
            </form>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kuppi Session Title</h5>
                        <span class="badge">Uva wellassa University</span>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                        </p>
                        <span class="DateTime">Date:</span><br>
                        <span class="DateTime">Time:</span><br>
                        <button type="button" class="btn btn-primary btn-sm link">
                            <a href="#">Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i></a>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm download">
                            Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kuppi Session Title</h5>
                        <span class="badge">Uva wellassa University</span>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                        </p>
                        <span class="DateTime">Date:</span><br>
                        <span class="DateTime">Time:</span><br>
                        <button type="button" class="btn btn-primary btn-sm link">
                            <a href="#">Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i></a>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm download">
                            Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kuppi Session Title</h5>
                        <span class="badge">Uva wellassa University</span>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                        </p>
                        <span class="DateTime">Date:</span><br>
                        <span class="DateTime">Time:</span><br>
                        <button type="button" class="btn btn-primary btn-sm link">
                            <a href="#">Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i></a>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm download">
                            Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kuppi Session Title</h5>
                        <span class="badge">Uva wellassa University</span>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                        </p>
                        <span class="DateTime">Date:</span><br>
                        <span class="DateTime">Time:</span><br>
                        <button type="button" class="btn btn-primary btn-sm link">
                            <a href="#">Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i></a>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm download">
                            Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="grid-tile">
                        <span>Uva Wellassa University</span>
                        <button class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target="#universityKuppi">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Peradeniya</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Sri Jayewardenepura</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Kelaniya</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Moratuwa</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Jaffna</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Ruhuna</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>Open University of Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>Eastern University, Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>South Eastern University<br />of Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>Rajarata University of Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>Sabaragamuwa University<br />of Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>Wayamba University of Sri Lanka</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of Colombo</span>
                        <button class="btn btn-primary btn-view">View Kuppis</button>
                    </div>
                </div>
                <div class="col">
                    <div class="grid-tile">
                        <span>University of the Visual & Performing Arts</span>
                        <button class="btn btn-primary  btn-view">View Kuppis</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="externalSession">
        <div class="headerImage">
            <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
        </div>
        <div class="header">
            <h4>Browse For External Courses</h4>
            <p>Join courses conducted by undergraduates at a low cost</p>
        </div>
        <div class="courseContent">
            <?php
            if (isset($_GET['s'])) {
                if ($_GET['s'] == '101') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Payment Success visit Paid courses section !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                }
            }
            ?>
            <h4>Courses Available</h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="/KuppiMate/public/images/progs.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Course Title Here</h5>
                            <label>Yeran Lakvidu</label><br />
                            <label class="time-period">3 Months , 25 Lectures</label><br />
                            <label class="ratingval">4.2</label>
                            <label class="bi bi-star-fill"></label>
                            <label class="bi bi-star-fill"></label>
                            <label class="bi bi-star-fill"></label>
                            <label class="bi bi-star-fill"></label>
                            <label class="bi bi-star-fill"></label>
                            <label>(37)</label>
                            <p>LKR 6000.00</p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#enrollNow" class="btn btn-primary">Enroll Now</a>
                        </div>
                        <!--popup enroll now-->
                        <div class="modal fade" id="enrollNow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Course Title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="fw-bold mb-1">Introduction</h5>
                                        <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>

                                        <h5 class="fw-bold mb-1">Course Content</h5>
                                        <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>

                                        <h5 class="fw-bold mb-1">Who I Am</h5>
                                        <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>

                                        <h3 class="fw-bold">LKR.2000.00</h3>
                                        <form method="post" action="/KuppiMate/src/controller/checkout.php">
                                            <button type="submit" class="btn btn-primary mt-2">Buy Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="earnKuppi">
            <div class="header">
                <h4>Earn From KuppiMate</h4>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                    <div>
                        <span id="heading1">Get Approval and Start<br />
                            <span id="heading2">Earning Now</span>
                        </span>
                        <a href="#" data-bs-target="#ApprovalForm" data-bs-toggle="modal" class="btn btn-primary">Get Approval</a>
                        <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            <span class="extraContent">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br />
                            <span id="readMoreBtn">ReadMore</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <div>
                        <img src="/KuppiMate/public/images/external session.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <!--External session approval form-->
            <div class="modal fade" id="ApprovalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">External Session Approval Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <div>
                                    <label>Course Title</label><br />
                                    <input type="text" name="cTitle" required autocomplete="off"></br>
                                    <label>Time period</label><br />
                                    <input type="text" name="cTime" required autocomplete="off">
                                </div>
                                <div class="textArea">
                                    <label class="maxChar">About Course</label><br />
                                    <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                </div>
                                <div class="fee">
                                    <label>Course Fee</label><br />
                                    <input type="text" name="cFee" placeholder="12000" autocomplete="off">
                                </div>
                                <div class="textArea">
                                    <label class="maxChar">Course Content</label><br />
                                    <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                </div>
                                <div class="textArea">
                                    <label class="maxChar">Tell Something About You</label><br />
                                    <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                </div>
                                <div id="FileUpload">
                                    <label>Upload Your External Session Materials</label><br>
                                    <input type="file" multiple>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Request Approval</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="paid-courses">
        <div class="headerImage">
            <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Paid Course Title
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <h3>Tiltle of the course Here</h3>
                        <div class="course-links">
                            <div class="container">
                                <button class="download btn btn-outline-success">
                                    <span class="bi bi-cloud-arrow-down-fill"> Download Course Materials</span>
                                </button>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tutorDetails">
                            <h5>Contact Course Tutor</h5>
                            <div class="container">
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <b><label>Name :</label></b>
                                        <label>Name goes Here</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>Contact Number :</label></b>
                                        <label>0710619833</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>Email :</label></b>
                                        <label>designs.yeran@gmail.com</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>University Name :</label></b>
                                        <label>Uva Wellassa University</label><br />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="addReview">
                            <h5>Add a Review about the Course</h5>
                            <div class="container">
                                <form class="star-rating">
                                    <textarea class="descriptionx form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                                    <span id="rHead">Rate the Course Tutor&nbsp;</span><br />
                                    <span onclick="rating(1)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(2)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(3)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(4)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(5)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <input type="number" id="rating-value" readonly><br />
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Paid Course Title
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <h3>Tiltle of the course Here</h3>
                        <div class="course-links">
                            <div class="container">
                                <button class="download btn btn-outline-success">
                                    <span class="bi bi-cloud-arrow-down-fill"> Download Course Materials</span>
                                </button>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <label id="mDetail">Meeting LInk :</label>
                                        <label>Link here</label><br />
                                        <label id="mDetail">Date/Time :</label>
                                        <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tutorDetails">
                            <h5>Contact Course Tutor</h5>
                            <div class="container">
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">
                                        <b><label>Name :</label></b>
                                        <label>Name goes Here</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>Contact Number :</label></b>
                                        <label>0710619833</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>Email :</label></b>
                                        <label>designs.yeran@gmail.com</label><br />
                                    </div>
                                    <div class="p-2">
                                        <b><label>University Name :</label></b>
                                        <label>Uva Wellassa University</label><br />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="addReview">
                            <h5>Add a Review about the Course</h5>
                            <div class="container">
                                <form class="star-rating">
                                    <textarea class="descriptionx form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                                    <span id="rHead">Rate the Course Tutor&nbsp;</span><br />
                                    <span onclick="rating(1)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(2)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(3)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(4)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <span onclick="rating(5)" class="star"><i class="bi bi-star-fill"></i></span>
                                    <input type="number" id="rating-value" readonly><br />
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="my-courses">
        <form action="#">
            <div>
                <label class="form-label">Session Title</label><br />
                <input type="text" name="tName" required autocomplete="off">
            </div>
            <div>
                <label class="form-label">Time and Date</label><br />
                <input class="Kdate Kuppifrom" type="date" name="KuppiDate" required>
                <input class="Ktime Kuppifrom" type="time" name="Kuppitime" required>
                <label id="label-popup">to</label>
                <input class="Kdate Kuppito" type="date" name="KuppiDate" required>
                <input class="Ktime Kuppifrom" type="time" name="Kuppitime" required>
            </div>
            <div class="mt-4">
                <button type="reset" class="btn btn-outline-primary">Cancel</button>
                <button type="submit" class="btn btn-primary">Get the Link</button>
            </div>
        </form>
        <div class="container">
            <div class="d-flex flex-column mb-3">
                <div class="p-2">
                    <label id="mDetail">Meeting LInk :</label>
                    <label>Link here</label><br />
                    <label id="mDetail">Date/Time :</label>
                    <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                </div>
            </div>
            <div class="d-flex flex-column mb-3">
                <div class="p-2">
                    <label id="mDetail">Meeting LInk :</label>
                    <label>Link here</label><br />
                    <label id="mDetail">Date/Time :</label>
                    <label>06/02/13</label>&nbsp;&nbsp;<label>12.00PM</label><br />
                </div>
            </div>
        </div>
        <h3>Ratings and User Reviews</h3>
        <div class="container reviews">
            <div class="row gx-3">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div>
                        <p class="homecont-p fw-bold">User 1</p>

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div>
                        <p class="homecont-p fw-bold">User 2</p>

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="settings">
        <div class="container mt-5">
            <!-- profile error messages -->
            <?php
            if (isset($_GET['id'])) {
                if ($_GET['id'] == '101') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid name !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '102') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid email !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '103') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid number !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '104') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Updated Succeefully !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '105') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Failed to update details, try again !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '106') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Email already exist use another one !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '107') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    password strength is low !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '108') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Confirm password not match !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '109') {
                    echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Password update successfully !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '110') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Password update failed !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '111') {
                    echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    modal Password update failed !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                }
            }
            ?>

            <h4>Profile Details</h4>
            <div class="d-flex mb-3 mt-4">
                <div class="p-2 flex-fill">
                    <table>
                        <tr>
                            <td class="fw-bold pb-3">First Name:</td>
                            <td class="ps-4 pb-3"><?php echo $fName ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold pb-3">Last Name:</td>
                            <td class="ps-4 pb-3"><?php echo $lName ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold pb-3">University Name:</td>
                            <td class="ps-4 pb-3"><?php echo $university ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold pb-3">Email:</td>
                            <td class="ps-4 pb-3"><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold pb-3">Contact:</td>
                            <td class="ps-4 pb-3"><?php echo $contact ?></td>
                        </tr>
                    </table>
                </div>
                <div class="p-2 flex-fill "></div>
            </div>
        </div>
        <div class="container">
            <form action="/KuppiMate/src/controller/profileUpdate.php" method="post" class="row g-3">
                <div class="class-md-12">
                    <h4>Edit Profile</h4>
                </div>
                <div class="col-md-4">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control" id="fname">
                </div>
                <div class="col-md-4">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="lname">
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="col-md-4">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" class="form-control" id="contact">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-12 mt-4">
                    <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
            <form action="/KuppiMate/src/controller/passwordUpdate.php" method="post" class="row g-3 mt-3">
                <div class="class-md-12">
                    <h4>Change the Login Password</h4>
                </div>
                <div class="col-md-4">
                    <label for="pr-password" class="form-label">Current Password</label>
                    <input type="password" name="pr-password" class="form-control" id="pr-password" required>
                </div>
                <div class="col-md-4">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" name="new-password" class="form-control" id="new-password" required>
                </div>
                <div class="col-md-4">
                    <label for="con-password" class="form-label">Confirm New Password</label>
                    <input type="password" name="con-password" class="form-control" id="con-password" required>
                </div>
                <div class="col-12 mt-4">
                    <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </section>
    </div>
    <!--delete session confirm-->
    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete the session ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/createKuppi.php" method="post">
                        <input type="hidden" name="deleteSessionId" value="<?php echo $output['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/KuppiMate/public/js/ug-dashboard.js?v=<?php echo time(); ?>"></script>
</body>

</html>