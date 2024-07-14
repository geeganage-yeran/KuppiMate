<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "administrator") {
    header("Location: /KuppiMate/src/view/login.php");
    exit();
}
$fName=$_SESSION['first_name'];
$role=$_SESSION['role'];
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
            <li><a href="#" onclick="showSection('External-sessions')"><i class="bi bi-easel3-fill"></i>&nbsp;&nbsp;&nbsp;External Sessions</a></li>
            <li><a href="#" onclick="showSection('user-feedbacks')"><i class="bi bi-fingerprint"></i>&nbsp;&nbsp;&nbsp;User Feedbacks</a></li>
            <li style="margin-top: 170px;"><a href="/KuppiMate/src/controller/logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
                                <span class="fw-bold fs-1">125</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-3">Verified Accounts<br>
                                <span class="fw-bold fs-1">125</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-3">Verified Accounts<br>
                                <span class="fw-bold fs-1">125</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div>
                            <p class="homecont-p fw-bold fs-5">Total undergraduates
                                <span class="fs-5">125</span>
                            </p>
                            <p class="homecont-p fw-bold fs-5">Need to be Verify
                                <span class="fs-5">125</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h4>Noice Section</h4>
                <div class="notice table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">BroadCcast</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>2024.05.17</td>
                                <td>Description Here</td>
                                <td><button class="btn btn-primary btn-sm">Broadcast</button></td>
                            </tr>
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
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">University</th>
                                <th scope="col">Verification Documents</th>
                                <th scope="col">Activate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>2024.05.17</td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm">Activate</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>2024.05.17</td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm">Activate</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>2024.05.17</td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm">Activate</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>Undergraduates - Verified</h4>
                <div class="verified table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">University</th>
                                <th scope="col">Verification Status</th>
                                <th scope="col">Deactivate</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>Uva wellassa University</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><button class="btn btn-primary btn-sm">Deactivate</button></td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>yeran</td>
                                <td>Computer Science</td>
                                <td>Uva wellassa University</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><button class="btn btn-primary btn-sm">Deactivate</button></td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <h4>External User Accounts</h4>
                <div class="exAccounts table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran</td>
                                <td>Lavkvidu</td>
                                <td>design.yeran@gmail.com</td>
                                <td>0710619833</td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Yeran</td>
                                <td>Lavkvidu</td>
                                <td>design.yeran@gmail.com</td>
                                <td>0710619833</td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="Kuppi-sessions">
            <div class="container">
                <h4>External Tutor Session Requests</h4>
                <div class="exRequest table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">From Date|Time</th>
                                <th scope="col">To Date|Time</th>
                                <th scope="col">Category</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data Structures</td>
                                <td>2024.05.17 02.00PM</td>
                                <td>2024.05.17 03.00PM</td>
                                <td>Cat 01</td>
                                <td><button class="btn btn-primary btn-sm">Approve</button></td>
                                <td><button class="btn btn-danger btn-sm">Reject</button></td>
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
                <h4>Approved External Tutor Sessions</h4>
                <div class="exApproved table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">From Date|Time</th>
                                <th scope="col">To Date|Time</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data Structures</td>
                                <td>2024.05.17 02.00PM</td>
                                <td>2024.05.17 03.00PM</td>
                                <td>Cat 01</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="content" id="External-sessions">
            <div class="container">
                <h4>Kuppi Sessions - Pending Approval</h4>
                <div class="exVerification table-responsive">
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Yeran</td>
                                <td>Data Structures</td>
                                <td>Description is here Description is here Description is here</td>
                                <td>LKR.2000.00</td>
                                <td><button class="btn btn-primary btn-sm">Approve</button></td>
                                <td><button class="btn btn-danger btn-sm">Reject</button></td>
                            </tr>

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
    <script src="/KuppiMate/public/js/Ex-dashboard.js?v=<?php echo time(); ?>"></script>
</body>

</html>