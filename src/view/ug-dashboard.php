<?php
include_once __DIR__ . '/../controller/createKuppi.php';
include_once __DIR__ . '/../controller/noticeController.php';
include_once __DIR__ . '/../controller/attendanceController.php';
include_once __DIR__ . '/../controller/universityContoller.php';
include_once __DIR__ . '/../controller/feedbackController.php';
include_once __DIR__ . '/../controller/externalSessionController.php';
include_once __DIR__ . '/../controller/subscriptionController.php';
include_once __DIR__ . '/../controller/externalSessionFeedback.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "undergraduate") {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$isSearched = isset($_SESSION['isSearched']) ? $_SESSION['isSearched'] : 0;
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
            <li><a href="#" onclick="showSection('enrolled-kuppis')"><i class="bi bi-person-workspace"></i>&nbsp;&nbsp;&nbsp;Enrolled Kuppis</a></li>
            <li><a href="#" onclick="showSection('externalSession')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;External Tutor Sessions</a></li>
            <li><a href="#" onclick="showSection('paid-courses')"><i class="bi bi-cash-stack"></i>&nbsp;&nbsp;&nbsp;Paid Courses</a></li>
            <li><a href="#" onclick="showSection('my-courses')"><i class="bi bi-easel3-fill"></i>&nbsp;&nbsp;&nbsp;My Courses</a></li>
            <li><a href="#" onclick="showSection('settings')"><i class="bi bi-gear-fill"></i>&nbsp;&nbsp;&nbsp;Settings</a></li>
            <li><a data-bs-toggle="modal" data-bs-target="#logoutConfirm" href="/KuppiMate/src/controller/logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
                            <p>To join a Kuppi session on KuppiMate, sign up with your email address and complete the academic verification process. Once logged in, go to the "Join for a Kuppi" select one that suits your academic needs, and click the enroll now to get the session link to join and participate</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-people-fill"></i>
                            <p class="homecont-p">How to schedule a Kuppi</p>
                            <p>To schedule a Kuppi session on KuppiMate, log in and navigate to the "Create a Kuppi" section. Enter details such as the topic, date, time, then submit your request for approval. Once approved, your session will appear on the notice board for others to join.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-lines-fill"></i>
                            <p class="homecont-p">About external session</p>
                            <p>External sessions on KuppiMate allow verified undergraduates to host educational sessions for both peers and external learners. These sessions can be offered as either free or paid, providing flexible learning opportunities for all participants.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-video3"></i>
                            <p class="homecont-p">Join for an external session</p>
                            <p>Registered users can browse available sessions, select one of interest, and complete the payment and registration process for the session.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-question-lg"></i>
                            <p class="homecont-p">Any questions</p>
                            <p>You can simply send an email to kuppimate@gmail.com.</p>
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
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    canot use special characters in title and description except dash,underscore
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '3') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Session Created Successfully check the bottom of the page
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '7') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Uploaded the File Successfully For the session 
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '8') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Deleted the Session Successfully
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                } elseif ($_GET['id'] == '6') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Failed to Create the Notice
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                }
            }
            ?>
            <!--message display section end-->

            <form action="/KuppiMate/src/controller/createKuppi.php" method="POST" onsubmit="return createKuppi()">
                <div class="createKuppiContainer">
                    <div id="createKuppiHeading">Schedule your Kuppi Session</div>
                    <div id="CreateKuppiTitle">
                        <label>Session Title</label><br>
                        <input type="text" name="tName" id="kTitle" required autocomplete="off">
                    </div>
                    <div id="CreateKuppiFrom">
                        <label>Time and Date</label><br>
                        <input class="Kdate Kuppifrom" type="datetime-local" id="kSTime" name="startDate" required>
                        <label>to</label>
                        <input class="Kdate Kuppito" type="datetime-local" id="kETime" name="endDate" required>
                    </div>
                    <div id="selectCategory">
                        <label>Session Category</label><br>
                        <select name="category" id="category" required>
                            <?php if ($catList != null) { ?>
                                <?php foreach ($catList as $catName) { ?>
                                    <option value="<?php echo $catName['id'] ?>"><?php echo $catName['category_name'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="textArea">
                        <label class="maxChar">Session Description</label><br>
                        <textarea class="description" name="description" id="kDescription" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
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
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmModal" data-session-id="<?php echo $output['id']; ?>">Delete Session</button>
                            <button onclick="window.open('<?php echo $output['session_link']  ?>', '_blank');" class="btn btn-outline-success ps-4 pe-4" <?php echo ($output['status'] == 'pending') ? 'disabled' : ''; ?>>start</button>
                            <p>Approval process will complete within few minutes (Note : Only .Zip .Rar files are allowed to Upload)</p>
                        </div>
                    <?php }; ?>
                <?php  } else { ?>
                    <div class="container alert alert-danger text-center" role="alert">
                        <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Session Created Yet
                    </div>
                <?php } ?>
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
                <form action="/KuppiMate/src/controller/noticeFilter.php" method="POST">
                    <label>Filter By Category:</label>
                    <select id="category-select" name="noticeFilterCat">
                        <option value="">Select a Category</option>
                        <?php if (!empty($catList)) { ?>
                            <?php foreach ($catList as $catName) { ?>
                                <option value="<?php echo $catName['id'] ?>"><?php echo $catName['category_name'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <label class="ms-3">Filter By University:</label>
                    <select id="uni-select" name="noticeFilterUni">
                        <option value="">Select a University</option>
                        <?php if (!empty($uniList)) { ?>
                            <?php foreach ($uniList as $uniName) { ?>
                                <option value="<?php echo $uniName['id'] ?>"><?php echo $uniName['name'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select><br />
                    <label class="ms-0 mt-3" id="date-filter">Filter By Date:</label>
                    <input type="date" class="Kdate Kuppifrom" name="dateFilter" id="dateFilter"><br />
                    <input type="reset" class="btn btn-primary btn-sm mt-3 " id="clearButton" value="Clear All">
                    <input type="submit" class="btn btn-primary btn-sm mt-3" value="Filter">
                </form>
            </div>

            <?php if ($isSearched == 0) { ?>
                <div class="row">
                    <?php if (!empty($noticeAvailable)) { ?>
                        <?php foreach ($noticeAvailable as $notice1) { ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $notice1['title']; ?></h5>
                                        <span class="badge"><?php echo $notice1['name']; ?></span>
                                        <p class="card-text"><?php echo $notice1['description']; ?></p>
                                        <span class="DateTime"><b>Date:</b> <?php echo $notice1['startDate']; ?></span><br>
                                        <span class="DateTime"><b>Time:</b> <?php echo $notice1['startTime']; ?></span><br>
                                        <form action="/KuppiMate/src/controller/attendanceController.php" method="post">
                                            <input name="uId" type="text" value="<?php echo $_SESSION['id']; ?>" hidden>
                                            <input name="sId" type="text" value="<?php echo $notice1['sessions_id']; ?>" hidden>
                                            <?php
                                            $alreadyEnrolled = false;
                                            foreach ($isEnrolled as $enrolled) {
                                                if ($enrolled['user_id'] == $_SESSION['id'] && $enrolled['session_id'] == $notice1['sessions_id']) {
                                                    $alreadyEnrolled = true;
                                                    break;
                                                }
                                            }
                                            if ($alreadyEnrolled) { ?>
                                                <span class="badge bg-primary text-white enrolled">Already Enrolled</span><br />
                                                <button type="button" class="btn btn-primary btn-sm link" onclick="window.open('<?php echo $notice1['session_link']; ?>','_blank')">
                                                    Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i>
                                                </button>
                                                <?php if (!empty($notice1['file_name'])): ?>
                                                    <button type="button" class="btn btn-primary btn-sm download" onclick="window.location.href='/KuppiMate/src/controller/material-uploads/<?php echo $notice1['file_name']; ?>'">
                                                        Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <button type="submit" id="enroll_now" class="btn btn-primary btn-sm enroll">Enroll Now</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Notice Available
                        </div>
                    <?php  } ?>
                </div>

            <?php } elseif ($isSearched == 1) { ?>
                <div class="row">
                    <?php if (!empty($_SESSION['filterByCategory'])) { ?>
                        <?php foreach ($_SESSION['filterByCategory'] as $fCat1) { ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $fCat1['title']; ?></h5>
                                        <span class="badge"><?php echo $fCat1['name']; ?></span>
                                        <p class="card-text"><?php echo $fCat1['description']; ?></p>
                                        <span class="DateTime"><b>Date:</b> <?php echo $fCat1['startDate']; ?></span><br>
                                        <span class="DateTime"><b>Time:</b> <?php echo $fCat1['startTime']; ?></span><br>
                                        <form action="/KuppiMate/src/controller/attendanceController.php" method="post">
                                            <input name="uId" type="text" value="<?php echo $_SESSION['id']; ?>" hidden>
                                            <input name="sId" type="text" value="<?php echo $fCat1['sessions_id']; ?>" hidden>
                                            <?php
                                            $alreadyEnrolled = false;
                                            foreach ($isEnrolled as $enrolled) {
                                                if ($enrolled['user_id'] == $_SESSION['id'] && $enrolled['session_id'] == $fCat1['sessions_id']) {
                                                    $alreadyEnrolled = true;
                                                    break;
                                                }
                                            }
                                            if ($alreadyEnrolled) { ?>
                                                <span class="badge bg-primary text-white enrolled">Already Enrolled</span><br />
                                                <button type="button" class="btn btn-primary btn-sm link" onclick="window.open('<?php echo $fCat1['session_link']; ?>','_blank')">
                                                    Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i>
                                                </button>
                                                <?php if (!empty($notice1['file_name'])): ?>
                                                    <button type="button" class="btn btn-primary btn-sm download" onclick="window.location.href='/KuppiMate/src/controller/material-uploads/<?php echo $fCat1['file_name']; ?>'">
                                                        Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <button type="submit" id="enroll_now" class="btn btn-primary btn-sm enroll">Enroll Now</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Notice Available
                        </div>
                    <?php  } ?>
                </div>

            <?php } elseif ($isSearched == 2) { ?>
                <div class="row">
                    <?php if (!empty($_SESSION['filterByDate'])) { ?>
                        <?php foreach ($_SESSION['filterByDate'] as $fDate1) { ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $fDate1['title']; ?></h5>
                                        <span class="badge"><?php echo $fDate1['name']; ?></span>
                                        <p class="card-text"><?php echo $fDate1['description']; ?></p>
                                        <span class="DateTime"><b>Date:</b> <?php echo $fDate1['startDate']; ?></span><br>
                                        <span class="DateTime"><b>Time:</b> <?php echo $fDate1['startTime']; ?></span><br>
                                        <form action="/KuppiMate/src/controller/attendanceController.php" method="post">
                                            <input name="uId" type="text" value="<?php echo $_SESSION['id']; ?>" hidden>
                                            <input name="sId" type="text" value="<?php echo $fDate1['sessions_id']; ?>" hidden>
                                            <?php
                                            $alreadyEnrolled = false;
                                            foreach ($isEnrolled as $enrolled) {
                                                if ($enrolled['user_id'] == $_SESSION['id'] && $enrolled['session_id'] == $fDate1['sessions_id']) {
                                                    $alreadyEnrolled = true;
                                                    break;
                                                }
                                            }
                                            if ($alreadyEnrolled) { ?>
                                                <span class="badge bg-primary text-white enrolled">Already Enrolled</span><br />
                                                <button type="button" class="btn btn-primary btn-sm link" onclick="window.open('<?php echo $fDate1['session_link']; ?>','_blank')">
                                                    Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i>
                                                </button>
                                                <?php if (!empty($fDate1['file_name'])): ?>
                                                    <button type="button" class="btn btn-primary btn-sm download" onclick="window.location.href='/KuppiMate/src/controller/material-uploads/<?php echo $fDate1['file_name']; ?>'">
                                                        Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <button type="submit" id="enroll_now" class="btn btn-primary btn-sm enroll">Enroll Now</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Notice Available
                        </div>
                    <?php  } ?>
                </div>

            <?php } elseif ($isSearched == 3) { ?>
                <div class="row">
                    <?php if (!empty($_SESSION['filterByUni'])) { ?>
                        <?php foreach ($_SESSION['filterByUni'] as $uni1) { ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $uni1['title']; ?></h5>
                                        <span class="badge"><?php echo $uni1['name']; ?></span>
                                        <p class="card-text"><?php echo $uni1['description']; ?></p>
                                        <span class="DateTime"><b>Date:</b> <?php echo $uni1['startDate']; ?></span><br>
                                        <span class="DateTime"><b>Time:</b> <?php echo $uni1['startTime']; ?></span><br>
                                        <form action="/KuppiMate/src/controller/attendanceController.php" method="post">
                                            <input name="uId" type="text" value="<?php echo $_SESSION['id']; ?>" hidden>
                                            <input name="sId" type="text" value="<?php echo $uni1['sessions_id']; ?>" hidden>
                                            <?php
                                            $alreadyEnrolled = false;
                                            foreach ($isEnrolled as $enrolled) {
                                                if ($enrolled['user_id'] == $_SESSION['id'] && $enrolled['session_id'] == $uni1['sessions_id']) {
                                                    $alreadyEnrolled = true;
                                                    break;
                                                }
                                            }
                                            if ($alreadyEnrolled) { ?>
                                                <span class="badge bg-primary text-white enrolled">Already Enrolled</span><br />
                                                <button type="button" class="btn btn-primary btn-sm link" onclick="window.open('<?php echo $uni1['session_link']; ?>','_blank')">
                                                    Get the Link&nbsp;&nbsp;<i class="bi bi-link"></i>
                                                </button>
                                                <?php if (!empty($uni1['file_name'])): ?>
                                                    <button type="button" class="btn btn-primary btn-sm download" onclick="window.location.href='/KuppiMate/src/controller/material-uploads/<?php echo $uni1['file_name']; ?>'">
                                                        Download Kuppi Materials&nbsp;&nbsp;<i class="bi bi-download"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <button type="submit" id="enroll_now" class="btn btn-primary btn-sm enroll">Enroll Now</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Notice Available
                        </div>
                    <?php  } ?>
                </div>
            <?php } ?>
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
                <!-- message display -->
                <?php
                if (isset($_GET['s'])) {
                    if ($_GET['s'] == '101') {
                        echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Payment Success visit Paid courses section !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['s'] == '1001') {
                        echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Session request submitted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['s'] == '102') {
                        echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Payment Failed Try Again !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    }
                }
                ?>
                <h4>Courses Available</h4>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php if ($courses != NULL) { ?>
                        <?php foreach ($courses as $course) { ?>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="/KuppiMate/public/images/progs.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $course['title']; ?></h5>
                                        <label>
                                            <?php echo $course['first_name'] . ' '; ?>
                                            <?php echo $course['last_name']; ?>
                                        </label><br />
                                        <label class="time-period"><?php echo $course['time_period']; ?></label><br />
                                        <label class="ratingval"><?php echo number_format($course['average_feedback'], 1); ?></label>
                                        <!-- calculating rating starts to be color -->
                                        <?php
                                        $average_feedback = number_format($course['average_feedback'], 1);
                                        $full_stars = floor($average_feedback);
                                        $half_star = ($average_feedback - $full_stars) >= 0.5 ? 1 : 0;
                                        $total_stars = 5;
                                        ?>

                                        <?php for ($i = 0; $i < $full_stars; $i++): ?>
                                            <label class="bi bi-star-fill filled"></label>
                                        <?php endfor; ?>

                                        <?php if ($half_star): ?>
                                            <label class="bi bi-star-half filled"></label>
                                        <?php endif; ?>

                                        <?php for ($i = 0; $i < ($total_stars - $full_stars - $half_star); $i++): ?>
                                            <label class="bi bi-star"></label>
                                        <?php endfor; ?>

                                        <label><?php echo '(' . $course['feedback_count'] . ')'; ?></label>
                                        <p>LKR <?php echo number_format($course['tutor_fee'], 2, '.', ',') ?></p>
                                        <?php if (in_array($course['id'], $alreadyEnrolledCourses)) { ?>
                                            <button class="btn btn-primary" disabled>Already Enrolled</button>
                                        <?php } else { ?>
                                            <button
                                                data-bs-toggle="modal"
                                                data-bs-target="#enrollNow"
                                                data-session-id="<?php echo $course['id']; ?>"
                                                data-session-title="<?php echo $course['title']; ?>"
                                                data-description="<?php echo $course['description']; ?>"
                                                data-course-content="<?php echo $course['course_content']; ?>"
                                                data-about-tutor="<?php echo $course['about_tutor']; ?>"
                                                data-tutor-fee="<?php echo $course['tutor_fee']; ?>"
                                                class="btn btn-primary enroll-button">
                                                Enroll Now
                                            </button>
                                        <?php } ?>
                                    </div>
                                    <!-- Popup Enroll Now Modal -->
                                    <div class="modal fade" id="enrollNow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="fw-bold mb-1">Description</h5>
                                                    <p class="fs-6" id="course-description"></p>

                                                    <h5 class="fw-bold mb-1">Course Content</h5>
                                                    <p class="fs-6" id="course-content"></p>

                                                    <h5 class="fw-bold mb-1">Who I Am</h5>
                                                    <p class="fs-6" id="about-tutor"></p>

                                                    <h3 class="fw-bold" id="tutor-fee"></h3>

                                                    <form method="post" action="/KuppiMate/src/controller/checkout.php">
                                                        <input type="hidden" name="course_id" id="course-id" value="">
                                                        <input type="hidden" name="course_title" id="course-title-set" value="">
                                                        <input type="hidden" name="course_fee" id="course-fee-set" value="">
                                                        <button type="submit" class="btn btn-primary mt-2">Buy Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="container alert alert-danger text-center fw-bold" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Sessions Available
                        </div>
                    <?php } ?>

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
                            <?php if ($averageRatingCount >= 3.5 && $sessionCount >= 2) { ?>
                                <button data-bs-target="#ApprovalForm" data-bs-toggle="modal" class="btn btn-primary">Get Approval</button>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark fs-6">Not Eligible</span>
                            <?php } ?>
                            <p>KuppiMate provides undergraduates with a unique opportunity to earn by sharing their knowledge through external sessions. By becoming a verified tutor, students can schedule and lead sessions on subjects they excel in. Once approved, these sessions are open to other students and external learners, offering a platform to teach and earn. The process is simple: get verified, schedule your sessions, and start earning from your expertise. It's a great way to make a difference, gain valuable experience, and earn through KuppiMate.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
                        <div>
                            <img src="/KuppiMate/public/images/external session.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <!--display error-->
                <?php
                if (isset($_SESSION['form_errors']) && !empty($_SESSION['form_errors'])) {
                    foreach ($_SESSION['form_errors'] as $error) {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>$error<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
                    unset($_SESSION['form_errors']);
                }
                ?>
                <!--External session approval form-->
                <div class="modal fade" id="ApprovalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">External Session Approval Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- External session approval form -->
                                <form action="/KuppiMate/src/controller/externalSessionController.php" method="post" onsubmit="return validateExternalCourseForm()">
                                    <div>
                                        <label>Course Title</label><br />
                                        <input type="text" name="cTitle" id="cTitle" required autocomplete="off"><br />
                                        <label>Time period</label><br />
                                        <input type="text" name="cTime" id="cTime" required autocomplete="off">
                                    </div>
                                    <div class="textArea">
                                        <label class="maxChar">About Course</label><br />
                                        <textarea class="description" name="description" id="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div class="fee">
                                        <label>Course Fee</label><br />
                                        <input type="text" name="cFee" id="cFee" placeholder="12000" autocomplete="off">
                                    </div>
                                    <div class="textArea">
                                        <label class="maxChar">Course Content</label><br />
                                        <textarea class="description" name="descriptionC" id="descriptionC" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div class="textArea">
                                        <label class="maxChar">Tell Something About You</label><br />
                                        <textarea class="description" name="descriptionA" id="descriptionA" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Request Approval</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="content" id="enrolled-kuppis">
            <div class="headerImage">
                <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
            </div>
            <!-- $enrolledList -->
            <div class="row mt-2">
                <?php if (!empty($enrolledList)) { ?>
                    <?php foreach ($enrolledList as $enrolled) { ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title"><b><?php echo $enrolled['title']; ?></b></h6>
                                    <span class="DateTime">Enrolled Date: <?php echo $enrolled['attendedDate'];  ?></span><br>
                                    <?php
                                    $isRecorded = false;
                                    if ($enrolled['recorded'] == 0) {
                                        $isRecorded = true;
                                    }
                                    ?>
                                    <button class="btn btn-secondary btn-sm" onclick="window.open('<?php echo $enrolled['driveLink']; ?>','_blank')" <?php if ($isRecorded) {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>View Session Recording</button><br />
                                    <?php if ($isRecorded) { ?>
                                        <p><small>Sorry, recorded session is not available yet</small></p><br />
                                    <?php } else { ?>
                                        <p><small>The recorded session remains only for 3 days</small></p><br />
                                    <?php } ?>

                                    <?php
                                    $hasFeedback = false;
                                    if (!empty($feedbackList)) {
                                        foreach ($feedbackList as $feedback1) {
                                            if ($feedback1['session_id'] == $enrolled['session_id']) {
                                                $hasFeedback = true;
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewKuppi" data-session-id="<?php echo $enrolled['session_id']; ?>" onclick="setSessionId(this)" <?php if ($hasFeedback) {
                                                                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                                                                    } ?>>
                                        Add a review
                                    </button>
                                    <?php if ($hasFeedback) { ?>
                                        <p class="text-danger"><small>Already reviewed</small></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="container alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Enrolled Kuppis Available
                    </div>
                <?php } ?>
            </div>
            <!-- display messages -->
            <?php
            if (isset($_GET['feedback'])) {
                if ($_GET['feedback'] == '0') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                        Please try again !
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                } elseif ($_GET['feedback'] == '1') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                        Reviewed successfully
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                }
            }
            ?>

            <!-- Modal for add review -->
            <div class="modal fade" id="reviewKuppi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">How was the Kuppi Session?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/KuppiMate/src/controller/feedbackController.php" method="post" class="star-rating">
                                <textarea class="descriptionx form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                                <span id="rHead">Rate the Course Tutor&nbsp;</span><br />
                                <span onclick="modalRating(1)" class="modal-star"><i class="bi bi-star-fill"></i></span>
                                <span onclick="modalRating(2)" class="modal-star"><i class="bi bi-star-fill"></i></span>
                                <span onclick="modalRating(3)" class="modal-star"><i class="bi bi-star-fill"></i></span>
                                <span onclick="modalRating(4)" class="modal-star"><i class="bi bi-star-fill"></i></span>
                                <span onclick="modalRating(5)" class="modal-star"><i class="bi bi-star-fill"></i></span>
                                <input type="number" name="ratingLevel" id="modal-rating-value" hidden readonly><br />
                                <input type="hidden" name="session_id" id="session-id" value="">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
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
            <?php
            if (isset($_SESSION['review_errors']) && !empty($_SESSION['review_errors'])) {
                foreach ($_SESSION['review_errors'] as $error) {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>$error<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
                unset($_SESSION['review_errors']);
            }
            if (isset($_GET['c'])) {
                if ($_GET['c'] == '101') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show mt-2' role='alert'>Reviewed successfully !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                } elseif ($_GET['c'] == '102') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>Failed to reviewed the session !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            }
            ?>
            <?php if ($paidCourses != null) { ?>
                <?php foreach ($paidCourses as $key => $paidCourse) { ?>
                    <div class="accordion accordion-flush" id="accordionFlush<?php echo $key + 1 ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?php echo $key + 1 ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $key + 1 ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $key + 1 ?>">
                                    <?php echo $paidCourse['title'] ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo $key + 1 ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $key + 1 ?>" data-bs-parent="#accordionFlush<?php echo $key + 1 ?>">
                                <div class="accordion-body">
                                    <div class="mt-4 course-links">
                                        <div class="container">
                                            <!-- material list-->
                                            <h6 style="color: #667085; font-weight: 600;  " class="mt-4 fw-semibold">Download your course materials</h6>
                                            <ol class="list-group list-group-flush mt-3">

                                                <?php if ($paidCourse['file_names'] != null) {
                                                    $fileNames = explode(',', $paidCourse['file_names']); ?>
                                                    <?php foreach ($fileNames as $index => $fileName) { ?>
                                                        <li class="list-group-item">
                                                            <a class="link-success text-decoration-none" href="/KuppiMate/src/controller/external_material_uploads/<?php echo trim($fileNames[$index]); ?>">
                                                                <i class="bi bi-arrow-down"></i>
                                                                <?php echo ' ' . $fileNames[$index] . '&nbsp;&nbsp;&nbsp;'; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="container alert alert-danger" role="alert">
                                                        <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Course Materials Available
                                                    </div>
                                                <?php  } ?>
                                            </ol>
                                            <!-- Session link -->
                                            <hr>
                                            <div class="d-flex flex-column mb-3">
                                                <div class="p-2">
                                                    <label id="mDetail">Meeting Link :</label>
                                                    <label><?php echo $paidCourse['session_link']; ?></label><br />
                                                    <button onclick="window.open('<?php echo $paidCourse['session_link']; ?>','_blank')" type="button" class="btn btn-primary bg-primary btn-sm">Join Now</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="tutorDetails">
                                        <h5>Contact Course Tutor</h5>
                                        <div class="container">
                                            <div class="d-flex flex-column mb-3">
                                                <div class="p-2">
                                                    <b><label>Name :</label></b>
                                                    <label><?php echo $paidCourse['first_name'] . ' ' . $paidCourse['last_name'] ?></label><br />
                                                </div>
                                                <div class="p-2">
                                                    <b><label>Contact Number :</label></b>
                                                    <label><?php echo $paidCourse['contact'] ?></label><br />
                                                </div>
                                                <div class="p-2">
                                                    <b><label>Email :</label></b>
                                                    <label><?php echo $paidCourse['email'] ?></label><br />
                                                </div>
                                                <div class="p-2">
                                                    <b><label>University Name :</label></b>
                                                    <label><?php echo $paidCourse['university_name'] ?></label><br />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="addReview">
                                        <h5>Add a Review about the Course</h5>
                                        <div <?php if ($reviewdIdList != null) {
                                                    if (in_array($paidCourse['tutor_session_id'], $reviewdIdList)) {
                                                        echo 'hidden';
                                                    }
                                                } ?> class="container">
                                            <form action="/KuppiMate/src/controller/externalSessionFeedback.php" method="post" class="star-rating">
                                                <textarea class="descriptionx form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                                                <span id="rHead">Rate the Course Tutor&nbsp;</span><br />
                                                <span onclick="rating(1, <?php echo $key; ?>)" class="star star-<?php echo $key; ?>"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(2, <?php echo $key; ?>)" class="star star-<?php echo $key; ?>"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(3, <?php echo $key; ?>)" class="star star-<?php echo $key; ?>"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(4, <?php echo $key; ?>)" class="star star-<?php echo $key; ?>"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(5, <?php echo $key; ?>)" class="star star-<?php echo $key; ?>"><i class="bi bi-star-fill"></i></span>
                                                <input type="text" name="tutorSessionId" value="<?php echo $paidCourse['tutor_session_id'] ?>" hidden>
                                                <input type="number" name="ratingLevel" readonly hidden class="rating-value-<?php echo $key; ?>"><br />
                                                <input type="submit" value="Submit">
                                            </form>
                                        </div>
                                        <?php if (in_array($paidCourse['tutor_session_id'], $reviewdIdList)) { ?>
                                            <span class="m-auto mt-1 badge bg-warning text-dark">You have already reviewd</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="container alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, You Don't Have Any Paid Courses
                </div>
            <?php } ?>
        </section>
        <section class="content" id="my-courses">
            <div class="headerImage">
                <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
            </div>

            <!--message display section-->
            <?php
            if (isset($_GET['id'])) {
                if ($_GET['id'] == '103') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                    Session deleted successfully
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } elseif ($_GET['id'] == '102') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                    Error occurred ! please contact administrator
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
            if (isset($_GET['m'])) {
                if ($_GET['m'] == '101') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                    Material Uploaded Successfully
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } elseif ($_GET['m'] == '102') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                    Error occurred while uploading !
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } elseif ($_GET['m'] == '103') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                    Unusual activity detected !
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } elseif ($_GET['m'] == '104') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                    Successfully Deleted 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } elseif ($_GET['m'] == '105') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                    Failed to delete ! 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
            ?>
            <!-- pending sessions section -->

            <div class="row">
                <?php if (!empty($pendingTutorSessions)) { ?>
                    <?php foreach ($pendingTutorSessions as  $pending) { ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $pending['title']; ?></h5>
                                    <p class="card-text"><?php echo $pending['description']; ?></p>
                                    <span style="font-size: 12px;" class="badge bg-<?php if ($pending['status'] == 'rejected') {
                                                                                        echo 'warning';
                                                                                    } else {
                                                                                        echo 'primary text-light';
                                                                                    } ?>  mt-2"><?php echo $pending['status']; ?></span>
                                    <button class="border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#externalSessionDeleteConfirm" data-session-id="<?php echo $pending['id']; ?>"><span style="font-size: 12px;" class="badge bg-danger text-light">Delete</span></button>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="container alert alert-danger text-center" role="alert">
                        <i class="bi bi-exclamation-octagon me-2 fs-4"></i>You Don't Have Any Pending or Rejected External Tutor Sessions
                    </div>
                <?php } ?>
            </div>

            <!--approve external session delete confirmation-->
            <div class="modal fade" id="externalSessionDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="externalSessionConfirmLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            Do you want to delete your session ?
                        </div>
                        <div class="modal-footer">
                            <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                                <input type="text" name="delete_session_id" id="delete_session_id_set" value="" hidden>
                                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary border-0">yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!--approve external session display -->

            <h4 style="color: #0B5ED7;" class="mt-0 fw-bold">Your Approved External Courses</h4>
            <div class="accordion" id="accordionExample">
                <?php if (!empty($approvedTutorSessions)) { ?>
                    <?php foreach ($approvedTutorSessions as $key => $approved) { ?>
                        <!-- Single Accordion Item -->
                        <div class="accordion-item mt-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold " type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key + 1;  ?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo $approved['title'];  ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $key + 1;  ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <!--upload materials-->

                                    <form action="/KuppiMate/src/controller/tutorMaterialController.php" enctype="multipart/form-data" method="POST">
                                        <input type="hidden" name="tutorSessionId" value="<?php echo $approved['id']; ?>">
                                        <input class="Bvalue" type="file" accept=".zip,.rar" name="eXMaterials" required>
                                        <button class="btn btn-primary btn-sm mt-2 material_upload" type="submit">Upload Learning Materials</button>
                                        <br />
                                    </form>

                                    <!-- uploaded material list-->

                                    <h6 style="color: #667085; font-weight: 600;  " class="mt-4 fw-semibold">Uploaded Materials</h6>
                                    <ol class="list-group list-group-flush mt-3">

                                        <?php if ($approved['file_names'] != null) {
                                            $fileNames = explode(',', $approved['file_names']); ?>
                                            <?php foreach ($fileNames as $index => $fileName) { ?>

                                                <li class="list-group-item">

                                                    <a class="link-success text-decoration-none" href="/KuppiMate/src/controller/external_material_uploads/<?php echo trim($fileNames[$index]); ?>">

                                                        <i class="bi bi-arrow-down"></i>
                                                        <?php echo ' ' . $fileNames[$index] . '&nbsp;&nbsp;&nbsp;'; ?>

                                                    </a>
                                                    <form action="/KuppiMate/src/controller/tutorMaterialController.php" method="post">
                                                        <input type="text" name="materialIdSet" value="<?php echo $approved['materialId'] ?>" hidden>
                                                        <button type="submit" class="border-0 bg-transparent ">
                                                            <span class="badge bg-danger">Delete</span>
                                                        </button>
                                                    </form>


                                                </li>

                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="container alert alert-danger" role="alert">
                                                <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Upload Materials Available
                                            </div>
                                        <?php  } ?>
                                    </ol>
                                    <!-- Session link -->
                                    <hr>

                                    <div class="container mt-4">
                                        <div class="d-flex flex-column mb-3">
                                            <div class="p-2">
                                                <label id="mDetail">Meeting Link :</label>
                                                <label><?php echo $approved['session_link']; ?></label><br />
                                                <button onclick="window.open('<?php echo $approved['session_link']; ?>','_blank')" type="button" class="btn btn-primary btn-sm">Start Now</button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Ratings and User Reviews -->
                                    <h3 class="mt-4">Ratings and User Reviews</h3>
                                    <div class="container reviews">
                                        <div class="row gx-3">
                                            <?php if ($approved['comment_list'] != null && $approved['comment_information'] != null && $approved['rating_list'] != null && $approved['date_list'] != null) {

                                                $commentList = explode(',', $approved['comment_list']);
                                                $commentedBy = explode(',', $approved['comment_information']);
                                                $ratingList = explode(',', $approved['rating_list']);
                                                $dateList = explode(',', $approved['date_list']);


                                                $count = min(count($commentList), count($commentedBy), count($ratingList), count($dateList));

                                                for ($i = 0; $i < $count; $i++) { ?>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                                        <div>
                                                            <p class="homecont-p fw-bold"><?php echo trim($commentedBy[$i]); ?></p>

                                                            <!-- Display the star ratings -->
                                                            <?php

                                                            $rating = intval(trim($ratingList[$i]));
                                                            for ($j = 0; $j < $rating; $j++) { ?>
                                                                <i class="bi bi-star-fill"></i>
                                                            <?php } ?>

                                                            <p><?php echo trim($commentList[$i]); ?></p>
                                                            <p><?php echo trim($dateList[$i]); ?></p>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="container alert alert-danger mt-3" role="alert">
                                                    <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Not Rated Yet
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="container alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, You Don't Have Any Approved External Tutor Sessions
                    </div>
                <?php } ?>

            </div>



        </section>
        <section class="content" id="settings">
            <div class="container mt-5">
                <!-- profile error messages -->
                <?php
                if (isset($_GET['id'])) {
                    if ($_GET['id'] == '101') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid name !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '102') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid email !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '103') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Invalid number !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '104') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Updated Succeefully !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '105') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Failed to update details, try again !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '106') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Email already exist use another one !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '107') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    password strength is low !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '108') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Confirm password not match !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '109') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Password update successfully !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '110') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Password update failed !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['id'] == '111') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
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
                <form action="/KuppiMate/src/controller/profileUpdate.php" onsubmit="return validateSetting()" method="post" class="row g-3">
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
    <div class="modal fade customModal" data-bs-backdrop="static" id="confirmModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this session will permanently remove it. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/createKuppi.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="deleteSessionIdSet" name="deleteSessionId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Logout confirmation-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="logoutConfirm" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-circle-fill icon-large"></i>
                    </div>
                    <p>Are you sure you want to log out ?</p>
                    <form action="/KuppiMate/src/controller/logout.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger ps-4 pe-4">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/KuppiMate/public/js/ug-dashboard.js?v=<?php echo time(); ?>"></script>
</body>

</html>