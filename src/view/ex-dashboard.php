<?php
include_once __DIR__ . '/../controller/feedbackController.php';
include_once __DIR__ . '/../controller/externalSessionController.php';
include_once __DIR__ . '/../controller/subscriptionController.php';
include_once __DIR__ . '/../controller/externalSessionFeedback.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "external_learner") {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$fName = $_SESSION['first_name'];
$role = $_SESSION['role'];
$lName = $_SESSION['last_name'];
$email = $_SESSION['email'];
$contact = $_SESSION['contact'];
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
    <title>External Learner</title>
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
            <li><a href="#" onclick="showSection('externalSession')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;External Tutor Sessions</a></li>
            <li><a href="#" onclick="showSection('paid-courses')"><i class="bi bi-cash-stack"></i>&nbsp;&nbsp;&nbsp;Paid Courses</a></li>
            <li><a href="#" onclick="showSection('settings')"><i class="bi bi-gear-fill"></i>&nbsp;&nbsp;&nbsp;Settings</a></li>
            <li style="margin-top: 170px;"><a data-bs-toggle="modal" data-bs-target="#logoutConfirm" href="/KuppiMate/src/controller/logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
                            <i class="bi bi-person-lines-fill"></i>
                            <p class="homecont-p">About external session</p>
                            <p>External sessions on KuppiMate allow verified undergraduates to host educational sessions for both peers and external learners. These sessions can be free or paid, providing flexible learning opportunities.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-person-video3"></i>
                            <p class="homecont-p">Join for an external session</p>
                            <p>Registered users can browse available sessions, select one of interest, and complete payment and registration for the session.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <i class="bi bi-question-lg"></i>
                            <p class="homecont-p">Any questions</p>
                            <p>You can just send an email to kuppimate@gmail.com</p>
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
                                                class="btn btn-primary">
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
                        <div class="container alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Session Available
                        </div>

                    <?php } ?>

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
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show mt-2' role='alert'>Reviewd successfully !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                } elseif ($_GET['c'] == '102') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>Failed to review the session !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
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
                                        <div <?php if (in_array($paidCourse['tutor_session_id'], $reviewdIdList)) {
                                                    echo 'hidden';
                                                } ?> class="container">
                                            <form action="/KuppiMate/src/controller/externalSessionFeedback.php" method="post" class="star-rating">
                                                <textarea class="descriptionx form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                                                <span id="rHead">Rate the Course Tutor&nbsp;</span><br />
                                                <span onclick="rating(1, <?php echo $key; ?>)" class="star"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(2, <?php echo $key; ?>)" class="star"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(3, <?php echo $key; ?>)" class="star"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(4, <?php echo $key; ?>)" class="star"><i class="bi bi-star-fill"></i></span>
                                                <span onclick="rating(5, <?php echo $key; ?>)" class="star"><i class="bi bi-star-fill"></i></span>
                                                <input type="text" name="tutorSessionId" value="<?php echo $paidCourse['tutor_session_id'] ?>" hidden>
                                                <input type="number" name="ratingLevel" readonly hidden class="rating-value"><br />
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
                    <i class="bi bi-exclamation-octagon me-2 fs-4"></i>Sorry, No Paid Courses To Display
                </div>
            <?php } ?>
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
                <form action="/KuppiMate/src/controller/exProfileController.php" onsubmit="return validateSetting()" method="post" class="row g-3">
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
                <form action="/KuppiMate/src/controller/exPasswordController.php" method="post" class="row g-3 mt-3">
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
    <script src="/KuppiMate/public/js/Ex-dashboard.js?v=<?php echo time(); ?>"></script>
</body>

</html>