<?php
include_once __DIR__ . '/../controller/adminController.php';
include_once __DIR__ . '/../controller/externalSessionApproval.php';
include_once __DIR__ . '/../controller/feedbackAdminController.php';
include_once __DIR__ . '/../controller/paymentController.php';
include_once __DIR__ . '/../controller/subscriptionController.php';
include_once __DIR__ . '/../controller/attendanceController.php';



if (!isset($_SESSION['role']) || $_SESSION['role'] !== "administrator") {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$fName = $_SESSION['first_name'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/ug-dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/KuppiMate/public/css/admin-dashboard.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
</head>

<body>
    <div class="sideBar" id="sidebar">
        <div class="profile">
            <h2><?php echo ucfirst(strtolower($fName)) ?></h2><i class="bi bi-x-lg" id="closeMenue"></i><br>
            <label class="fst-normal"><?php echo ucfirst(strtolower($role)) ?></label>
        </div>
        <ul class="navLinks">
            <li><a href="#" onclick="showSection('home')" class="active"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;&nbsp;Overview</a></li>
            <li><a href="#" onclick="showSection('user-management')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;User Managment</a></li>
            <li><a href="#" onclick="showSection('Kuppi-sessions')"><i class="bi bi-easel-fill"></i>&nbsp;&nbsp;&nbsp;Kuppi Sessions</a></li>
            <li><a href="#" onclick="showSection('Kuppi-categories')"><i class="bi bi-grid"></i>&nbsp;&nbsp;&nbsp;Kuppi Categories</a></li>
            <li><a href="#" onclick="showSection('External-sessions')"><i class="bi bi-easel3-fill"></i>&nbsp;&nbsp;&nbsp;External Sessions</a></li>
            <li><a href="#" onclick="showSection('user-feedbacks')"><i class="bi bi-fingerprint"></i>&nbsp;&nbsp;&nbsp;User Feedbacks</a></li>
            <li><a href="#" onclick="showSection('payments')"><i class="bi bi-cash"></i>&nbsp;&nbsp;&nbsp;Payment Details</a></li>
            <li><a href="#" onclick="showSection('kuppi-attendance')"><i class="bi bi-person-raised-hand"></i>&nbsp;&nbsp;&nbsp;Attendance Details</a></li>
            <li class="mt-3" style="margin-top: 90px;"><a href="" data-bs-toggle="modal" data-bs-target="#logoutConfirm"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
            <?php if (isset($_GET['n'])) {
                if ($_GET['n'] == '101') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>Notice Broadcasted Successfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                } elseif ($_GET['n'] == '102') {
                    echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>Successfully Deleted<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                } elseif ($_GET['n'] == '103') {
                    echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>Error Occurred<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            } ?>
            <div class="container admin-homecont">
                <div class="row gx-3">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-3">Total Users<br>
                                <span class="fw-bold fs-1"><?php echo $totalUsers ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-3">Active Accounts<br>
                                <span class="fw-bold fs-1"><?php echo $totalActive ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-3">External Accounts<br>
                                <span class="fw-bold fs-1"><?php echo $totalUsers - $totalUndergarduate ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-5">Total undergraduates -
                                <span class="fs-5"><?php echo $totalUndergarduate ?></span>
                            </p>
                            <p class="homecont-p fw-bold fs-5">Need to be Verify -
                                <span class="fs-5"><?php echo $needToVerify ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h4>Notice Section</h4>
                <div class="notice table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Broadcast</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($noticeToDisplay)) {
                                foreach ($noticeToDisplay as $index => $notice1) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1; ?></th>
                                        <td><?php echo $notice1['first_name']; ?></td>
                                        <td><?php echo $notice1['category_name']; ?></td>
                                        <td><?php echo $notice1['created_date'];
                                            $notice1['created_date']; ?></td>
                                        <td><span class="description" data-bs-toggle="popover" data-bs-content="<?php echo $notice1['description']; ?>">View Description</span></td>
                                        <td>
                                            <form action="/KuppiMate/src/controller/adminController.php" method="POST">
                                                <?php if ($notice1['broadcasted'] == 1) { ?>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteNotice" data-session-id="<?php echo $notice1['id']; ?>" class="btn btn-danger btn-sm">Remove Notice</button>
                                                <?php } else { ?>
                                                    <input type="hidden" name="noticeId" value="<?php echo $notice1['id']; ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm">Broadcast</button>
                                                <?php } ?>
                                            </form>

                                        </td>
                                    </tr>
                            <?php   }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="user-management">
            <div class="container">
                <h4>Undergraduates - Pending Verifications</h4>
                <?php if (isset($_GET['u'])) {
                    if ($_GET['u'] == '5') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    The user activated suceesfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['u'] == '6') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    User deleted successfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['u'] == '7') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    User account deactivated successfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['u'] == '8') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    User account activated successfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    }
                }
                ?>
                <div class="pVerification table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">University</th>
                                <th scope="col">Email</th>
                                <th scope="col">Verification Documents</th>
                                <th scope="col">Activate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result != null) { ?>
                                <?php foreach ($result as $index => $result) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $result['first_name']; ?></td>
                                        <td><?php echo $result['last_name']; ?></td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['email']; ?></td>
                                        <td>
                                            <a href="/KuppiMate/src/controller/uploads/<?php echo $result['verification_file_name']; ?>" target="_blank">
                                                <button class="btn btn-primary btn-sm">View</button>
                                            </a>
                                        </td>

                                        <td>
                                            <button class="btn btn-primary btn-sm" data-session-id="<?php echo $result['id']; ?>" data-bs-toggle="modal" data-bs-target="#activateUser">Activate</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Any Verification Requests</span>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Undergraduates - Verified</h4>
                <div class="verified table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">University</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Account Status</th>
                                <th scope="col"></th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($verified != NULL) {
                                foreach ($verified as $index => $verified) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $verified['first_name']; ?></td>
                                        <td><?php echo $verified['last_name']; ?></td>
                                        <td><?php echo $verified['name']; ?></td>
                                        <td><?php echo $verified['contact']; ?></td>
                                        <td>
                                            <span class="badge <?php echo ($verified['account_status'] == 'active') ? 'bg-success' : 'bg-danger'; ?>">
                                                <?php echo $verified['account_status']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <form action="/KuppiMate/src/controller/adminController.php" method="POST">
                                                <?php if ($verified['account_status'] == 'active') {
                                                    echo '<input type="hidden" name="inactiveId" value="' . $verified['id'] . '">';
                                                    echo '<button type="submit" class="btn btn-danger btn-sm">Deactivate</button>';
                                                } else {
                                                    echo '<input type="hidden" name="reactiveId" value="' . $verified['id'] . '">';
                                                    echo '<button type="submit" class="btn btn-primary btn-sm">Activate</button>';
                                                } ?>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-session-id="<?php echo $verified['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUser">Delete</button>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } else {
                                echo '<span class="badge bg-warning text-dark">No Any Verified Undergraduate Accounts</span>';
                            } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>External User Accounts</h4>
                <div class="exAccounts table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($exLearnerList != NULL) {
                                foreach ($exLearnerList as $index => $exLearner) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $exLearner['first_name'] ?></td>
                                        <td><?php echo $exLearner['last_name'] ?></td>
                                        <td><?php echo $exLearner['email'] ?></td>
                                        <td><?php echo $exLearner['contact'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-session-id="<?php echo $exLearner['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteExternalUser">Delete</button>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } else {
                                echo '<span class="badge bg-warning text-dark">No Any Verified External Accounts</span>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="Kuppi-sessions">
            <div class="container">
                <h4>Kuppi Session Requests</h4>
                <div class="exRequest table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">From Date|Time</th>
                                <th scope="col">To Date|Time</th>
                                <th scope="col">Category</th>
                                <th scope="col">Link</th>
                                <th scope="col">Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($kuppiresult != null) { ?>
                                <?php foreach ($kuppiresult as $index => $kuppiresult) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $kuppiresult['title']  ?></td>
                                        <td><?php echo $kuppiresult['session_start_date_time']  ?></td>
                                        <td><?php echo $kuppiresult['session_end_date_time']  ?></td>
                                        <td><?php echo $kuppiresult['category_name'] ?></td>

                                        <form action="/KuppiMate/src/controller/adminController.php" method="post">
                                            <td>
                                                <input type="text" placeholder=" Paste the Link" name="link" required>
                                                <input type="hidden" name="resultId" value="<?php echo $kuppiresult['id']; ?>">
                                            </td>
                                            <td><button type="submit" class="btn btn-primary btn-sm">Approve</button></td>

                                        </form>

                                    </tr>
                                <?php }; ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Kuppi Session Requests Yet</span>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Approved Kuppi Sessions</h4>
                <div class="exApproved table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">From Date|Time</th>
                                <th scope="col">To Date|Time</th>
                                <th scope="col">Category</th>
                                <th scope="col">Record Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($kuppiverified != null) { ?>
                                <?php foreach ($kuppiverified as $index => $kuppiverified) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $kuppiverified['title']  ?></td>
                                        <td><?php echo $kuppiverified['session_start_date_time']  ?></td>
                                        <td><?php echo $kuppiverified['session_end_date_time']  ?></td>
                                        <td><?php echo $kuppiverified['category_name'] ?></td>
                                        <form action="/KuppiMate/src/controller/adminController.php" method="post">
                                            <td>
                                                <input type="text" placeholder=" Paste the Link" name="recordedLink" required>
                                                <input type="hidden" name="recordId" value="<?php echo $kuppiverified['id']; ?>"><br />
                                                <?php
                                                $isRecorded = false;
                                                if (!empty($kuppiverified['recorded'])) {
                                                    $isRecorded = true;
                                                }
                                                ?>
                                                <button type="submit" class="btn btn-primary btn-sm mt-2" <?php if ($isRecorded) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>Upload Link</button>
                                            </td>
                                        </form>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteKuppi" data-session-id="<?php echo $kuppiverified['id']; ?>">Delete</button></td>
                                    </tr>
                                <?php }; ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Kuppi Sessions approved Yet</span>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="Kuppi-categories">
            <div class="container mt-4">
                <h4 class="fw-bold">Available Category List</h4>
                <div class="exRequest table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($catList != null) { ?>
                                <?php foreach ($catList as $index => $catNames) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $catNames['category_name']  ?></td>
                                        <td><button type="submit" class="btn btn-danger btn-sm" data-session-id="<?php echo $catNames['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteCat">Delete</button></td>
                                    </tr>
                                <?php }; ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No categories available</span>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="addCategory mt-4">
                    <div id="alertMessage" class="mt-4"></div>
                    <?php if (isset($_GET['id'])) {
                        if ($_GET['id'] == '120') {
                            echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    canot use special characters numbers except underscore
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        } elseif ($_GET['id'] == '122') {
                            echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Category Already Exist !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        } elseif ($_GET['id'] == '121') {
                            echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                        Category Created Successfully 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                        } elseif ($_GET['id'] == '130') {
                            echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                        Category Deleted Successfully 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                        }
                    }
                    ?>
                    <h6 class="mb-3">If Category is not listed you can add it from here:</h6>
                    <form action="/KuppiMate/src/controller/categoryController.php" onsubmit="return catNameValidation()" method="post">
                        <div>
                            <input type="text" class="form-control" id="catName" name="catName" placeholder="category name" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="content" id="External-sessions">
            <div class="container">
                <!--Error Messages---->
                <?php if (isset($_GET['ex'])) {
                    if ($_GET['ex'] == '101') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Approved Successfully
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['ex'] == '102') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                            Failed to Approve
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            </button>
                            </div>";
                    } elseif ($_GET['ex'] == '106') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                            Error Occurred !
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            </button>
                            </div>";
                    } elseif ($_GET['ex'] == '1001') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Deleted Successfully
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['ex'] == '1002') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                            Error Occurred Failed To Delete !
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            </button>
                            </div>";
                    }
                } ?>
                <h4>External Tutor Sessions - Pending Approval</h4>
                <div class="exVerification table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Title</th>
                                <th scope="col">Fee(LKR)</th>
                                <th scope="col">Time Period</th>
                                <th scope="col">Session Link</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pendingSessions != NULL) { ?>
                                <?php foreach ($pendingSessions as $index => $pedingSession1) { ?>
                                    <tr class="align-middle">
                                        <th scope="row"> <?php echo $index + 1 ?> </th>
                                        <td> <?php echo $pedingSession1['first_name'] ?> </td>
                                        <td> <?php echo $pedingSession1['title'] ?> </td>
                                        <td> <?php echo number_format($pedingSession1['tutor_fee'], 2, '.', ',') ?> </td>
                                        <td> <?php echo $pedingSession1['time_period'] ?> </td>
                                        <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                                            <td>
                                                <input type="text" placeholder=" Paste the Link" name="exLink" required>
                                                <input type="text" name="session_id" value="<?php echo $pedingSession1['id'] ?>" hidden>
                                            </td>
                                            <td><button type="submit" class="btn btn-primary btn-sm">Approve</button></td>

                                        </form>

                                        <td>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#externalSessionRejectConfirm" data-session-id="<?php echo $pedingSession1['id']; ?>">Reject</button>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <span class="badge bg-warning text-dark">No session available</span>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Approved External Tutor Sessions</h4>
                <div class="exVerified table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Time Period</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($approvedExternalSessions != null) { ?>
                                <?php foreach ($approvedExternalSessions as $index => $approvedExternal) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $approvedExternal['title'] ?></td>
                                        <td><?php echo $approvedExternal['time_period'] ?></td>
                                        <td><button data-bs-toggle="modal" data-bs-target="#externalSessionDeleteConfirm" data-session-id="<?php echo $approvedExternal['id']; ?>" class="btn btn-danger btn-sm" type="submit">Delete</button></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No approved sessions available</span>
                            <?php } ?>


                        </tbody>
                    </table>

                </div>
                <hr>
                <h4>Course Subscription Details</h4>
                <div class="subscription table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">Subscription Count</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($subList != null) { ?>
                                <?php foreach ($subList as $index => $sub) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $sub['first_name'] . ' ' . $sub['last_name'] ?></td>
                                        <td><?php echo $sub['subscription_count'] ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Subscriptions To Display Yet</span>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="user-feedbacks">
            <div class="container">
                <h4>User Feedbacks Section</h4>
                <!--feedback operation messages-->
                <?php if (isset($_GET['f'])) {
                    if ($_GET['f'] == '0') {
                        echo "<div id='alertMessage' class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                    Successfully deleted
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                    } elseif ($_GET['f'] == '1') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                            Failed to deleted
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            </button>
                            </div>";
                    } elseif ($_GET['f'] == '2') {
                        echo "<div id='alertMessage' class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                            Error with databse please contact administartor
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            </button>
                            </div>";
                    }
                } ?>
                <div class="feedbacks table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">Session Type</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Feedback By</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($listFeedbacks != null) { ?>
                                <?php foreach ($listFeedbacks as $index => $feedback) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $feedback['sessionCreatorFirstName'] . ' ' . $feedback['sessionCreatorLastName'] ?></td>
                                        <td><?php echo $feedback['related_table'] ?></td>
                                        <td><?php echo $feedback['comment'] ?></td>
                                        <td><b><?php echo $feedback['rating'] ?></b></td>
                                        <td><?php echo $feedback['feedbackByFirstName'] . ' ' . $feedback['feedbackByLastName'] ?></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteFeedback" data-session-id="<?php echo $feedback['id']; ?>">Delete</button></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Feedbacks To Display</span>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <h4>Feedback Count of Undergraduates</h4>
                <div class="feedbackCount table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">No of Kuppis</th>
                                <th scope="col">No of External Courses</th>
                                <th scope="col">Average Rating Count</th>
                                <th scope="col">Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($feedbackCount != null) { ?>
                                <?php foreach ($feedbackCount as $index => $feedbackC) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $feedbackC['first_name'] . ' ' . $feedbackC['last_name'] ?></td>
                                        <td><?php echo $feedbackC['email'] ?></td>
                                        <td><?php echo $feedbackC['kuppicount'] ?></td>
                                        <td><?php echo $feedbackC['tutorsession_count'] ?></td>
                                        <td><?php echo number_format($feedbackC['average_rating'], 2); ?></td>
                                        <td>
                                            <?php if (number_format($feedbackC['average_rating'], 2) >= 4.00) { ?>
                                                <span class="badge bg-success">Excellent</span>
                                            <?php } else if (number_format($feedbackC['average_rating'], 2) >= 3.00) { ?>
                                                <span class="badge bg-warning text-dark">Satisfactory</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Needs Improvement</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <span class="badge bg-warning text-dark">No Feedbacks To Display</span>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="payments">
            <div class="mt-4 container">
                <?php $earnings = 0 ?>
                <div class="panel">
                    <?php if ($paymentList != null) { ?>
                        <?php foreach ($paymentList as $key => $payment) { ?>
                            <?php $earnings += $payment['amount'] * 0.2 ?>
                        <?php } ?>
                        <div class="amount">LKR <?php echo  number_format($earnings, 2) ?></div>
                    <?php  } else { ?>
                        <div class="amount">LKR 0.00</div>
                    <?php } ?>

                    <div class="footer">Total Earnings After 20% Service Fee</div>
                </div>
                <div class="mt-4 payments table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Paid By</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($paymentList != null) { ?>
                                <?php foreach ($paymentList as $key => $payment) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $key + 1 ?></th>
                                        <td><?php echo $payment['first_name'] . ' ' . $payment['last_name'] ?></td>
                                        <td><?php echo $payment['title'] ?></td>
                                        <td><?php echo $payment['paidDate'] ?></td>
                                        <td><?php echo $payment['paidTime'] ?></td>
                                        <td><?php echo $payment['amount'] ?></td>
                                    </tr>
                                <?php } ?>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="kuppi-attendance">
            <div class="attendance table-responsive mt-4">
                <table class="table table-hover text-center table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Attendee Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date|Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($attendanceKuppi != null) { ?>
                            <?php foreach ($attendanceKuppi as $index => $attendance) { ?>
                                <tr>
                                    <th scope="row"><?php echo $index + 1 ?></th>
                                    <td><?php echo $attendance['first_name'] . ' ' . $attendance['last_name'] ?></td>
                                    <td><?php echo $attendance['title'] ?></td>
                                    <td><?php echo $attendance['created_date'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <span class="badge bg-warning text-dark">No Attendance Details To Display</span>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!--undergrduate delete verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteUser" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this user will permanently remove them. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="deleteUserIdSet" name="deleteId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--external delete verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteExternalUser" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this user will permanently remove them. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="deleteExUserIdSet" name="deleteId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--category delete verification not yet -->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteCat" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this category will permanently remove it. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/categoryDelete.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="deleteCatIdSet" name="deleteCatId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--kuppi session delete verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteKuppi" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="deleteKuppiSessionId" id="deleteKuppiSessionIdSet" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--delete notice verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteNotice" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this notice will permanently remove it. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="noticeDeleteSet" name="noticeDeleteId" value="" hidden>
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
    <!--reject external session confirmation-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="externalSessionRejectConfirm" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>The selected session will be rejected. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="text" name="reject_session_id" id="reject_session_id_set" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--delete external session confirmation-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="externalSessionDeleteConfirm" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this session will permanently remove it. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="text" name="delete_session_id_admin" id="delete_session_id_admin_set" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Delete Feedback Verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="deleteFeedback" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                        <h5>Warning!</h5>
                    </div>
                    <p>Deleting this feedback will permanently remove it. This action cannot be undone.</p>
                    <form action="/KuppiMate/src/controller/feedbackAdminController.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="deleteFeedbackSet" name="deleteFeedId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Activate user Verification-->
    <div class="modal fade customModal" data-bs-backdrop="static" id="activateUser" tabindex="-1" aria-labelledby="activateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-circle-fill icon-large"></i>
                        <h5>Confirm Account Activation</h5>
                    </div>
                    <p>Activating this account will enable access. Are you sure you want to proceed?</p>
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <div class="d-flex justify-content-center mt-4">
                            <input type="hidden" id="activateUserIdSet" name="activateUserId" value="" hidden>
                            <button type="button" class="btn btn-cancel btn-outline-dark me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-delete btn-primary">Activate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/KuppiMate/public/js/Ex-dashboard.js?v=<?php echo time(); ?>"></script>
    <script src="/KuppiMate/public/js/admin.js?v=<?php echo time(); ?>"></script>
</body>

</html>