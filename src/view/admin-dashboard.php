<?php
include_once __DIR__ . '/../controller/adminController.php';
include_once __DIR__ . '/../controller/externalSessionApproval.php';

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
            <li style="margin-top: 90px;"><a href="" data-bs-toggle="modal" data-bs-target="#logoutConfirm"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
                                <th scope="col">#</th>
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
                                                <?php if ($notice1['broadcasted'] == 1) {
                                                    echo '<button type="button" data-bs-toggle="modal" data-bs-target="#deleteNotice" class="btn btn-danger btn-sm">Remove Notice</button>';
                                                } else {
                                                    echo '<input type="hidden" name="noticeId" value="' . $notice1['id'] . '">';
                                                    echo '<button type="submit" class="btn btn-primary btn-sm">Broadcast</button>';
                                                } ?>
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
                                            <form action="/KuppiMate/src/controller/adminController.php" method="POST">
                                                <input type="hidden" name="acivateId" value="<?php echo $result['id']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">Activate</button>
                                            </form>
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
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser">Delete</button>
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
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteExternalUser">Delete</button>
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
                                <th scope="col">#</th>
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
                                                <button type="submit" class="btn btn-primary btn-sm mt-2" <?php if ($isRecorded) {echo 'disabled';} ?>>Upload Link</button>
                                            </td>
                                        </form>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteKuppi">Delete</button></td>
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
                <h4>Available Category List</h4>
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
                                        <td><button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCat">Delete</button></td>
                                    </tr>
                                <?php }; ?>
                            <?php } else { ?>
                                <span class="badge bg-secondary">No Categories Available</span>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="addCategory mt-4">
                    <?php if (isset($_GET['id'])) {
                        if ($_GET['id'] == '120') {
                            echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    canot use special characters numbers except underscore
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        } elseif ($_GET['id'] == '122') {
                            echo "<div class='alert alert-danger alert-dismissible fade show  mt-4' role='alert'>
                                    Category Already Exist !
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    </button>
                                    </div>";
                        } elseif ($_GET['id'] == '121') {
                            echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                        Category Created Successfully 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                        } elseif ($_GET['id'] == '130') {
                            echo "<div class='alert alert-success alert-dismissible fade show  mt-4' role='alert'>
                                        Category Deleted Successfully 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        </button>
                                        </div>";
                        }
                    }
                    ?>
                    <h6 class="mb-3">If Category is not listed you can add it from here:</h6>
                    <form action="/KuppiMate/src/controller/categoryController.php" method="post">
                        <div>
                            <input type="text" class="form-control" name="catName" placeholder="category name" required>
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
                <h4>External Tutor Sessions - Pending Approval</h4>
                <div class="exVerification table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Title</th>
                                <th scope="col">Fee(LKR)</th>
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
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#externalSessionConfirm" data-session-id="<?php echo $pedingSession1['id']; ?>">Approve</button>
                                        </td>
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
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">From Date|Time</th>
                                <th scope="col">To Date|Time</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data Structures</td>
                                <td>2024.05.17 02.00PM</td>
                                <td>2024.05.17 03.00PM</td>
                                <td>
                                    <form action="#">
                                        <input type="text" name="link" required>
                                        <button class="btn btn-primary btn-sm" type="submit">send</button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Recent Payment Details</h4>
                <div class="payments table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Paid By</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Ammount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran Lakvidu</td>
                                <td>Piyumi Ridmitha</td>
                                <td>2024.05.17</td>
                                <td>LKR.2000.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Course Subscription Details</h4>
                <div class="subscription table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">No of Subscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran Lakvidu</td>
                                <td>40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="user-feedbacks">
            <div class="container">
                <h4>User Feedbacks Section</h4>
                <div class="feedbacks table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Feedback By</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">Kuppi Session Tutor</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran</td>
                                <td>Piyumi</td>
                                <td>N/A</td>
                                <td>Feedaback Description Here</td>
                                <td>4</td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Yeran</td>
                                <td>N/A</td>
                                <td>Piyumi</td>
                                <td>Feedaback Description Here</td>
                                <td>4</td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <h4>Feedback Count of Undergraduates</h4>
                <div class="feedbackCount table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tutor Name</th>
                                <th scope="col">No of Kuppis</th>
                                <th scope="col">Average Rating count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran</td>
                                <td>05</td>
                                <td>4.5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!--undergrduate delete verification-->
    <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete this user ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <input type="hidden" name="deleteId" value="<?php echo $verified['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--external delete verification-->
    <div class="modal fade" id="deleteExternalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteExternalUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete this user ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <input type="hidden" name="deleteId" value="<?php echo $exLearner['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--kuppi session delete verification-->
    <div class="modal fade" id="deleteKuppi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteKuppiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete this session ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/createKuppi.php" method="post">
                        <input type="hidden" name="deleteKuppiSessionId" value="<?php echo $kuppiverified['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--category delete verification-->
    <div class="modal fade" id="deleteCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCatLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete this Category ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/categoryDelete.php" method="post">
                        <input type="hidden" name="deleteCatId" value="<?php echo $catNames['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--delete notice verification-->
    <div class="modal fade" id="deleteNotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteNoticeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to delete this notice ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/adminController.php" method="post">
                        <input type="hidden" name="noticeDeleteId" value="<?php echo $notice1['id']; ?>">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Logout confirmation-->
    <div class="modal fade" id="logoutConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutConfirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to logout ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/logout.php" method="post">
                        <button type="button" class="btn btn-secondary text-white border-0" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--approve external session confirmation-->
    <div class="modal fade" id="externalSessionConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="externalSessionConfirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to approve this session ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                        <input type="text" name="session_id" id="session_id_set" value="" hidden>
                        <button type="button" class="btn btn-secondary text-white border-0" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!--reject external session confirmation-->
     <div class="modal fade" id="externalSessionRejectConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="externalSessionConfirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    Do you want to reject this session ?
                </div>
                <div class="modal-footer">
                    <form action="/KuppiMate/src/controller/externalSessionApproval.php" method="post">
                        <input type="text" name="reject_session_id" id="reject_session_id_set" value="" hidden>
                        <button type="button" class="btn btn-secondary text-white border-0" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary border-0">yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/KuppiMate/public/js/Ex-dashboard.js?v=<?php echo time(); ?>"></script>
    <script src="/KuppiMate/public/js/admin.js?v=<?php echo time(); ?>"></script>
</body>

</html>