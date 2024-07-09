<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KuppiMate/public/css/ug-dashboard.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>External Learner Dashboard</title>
</head>

<body>
    <div class="sideBar" id="sidebar">
        <div class="profile">
            <h2>Yeran</h2><i class="bi bi-x-lg" id="closeMenue"></i><br>
            <label class="fst-normal">External Learner</label>
            <span class="badge bg-success">Active</span>
        </div>
        <ul class="navLinks">
            <li><a href="#" onclick="showSection('home')" class="active"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="#" onclick="showSection('externalSession')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;External Tutor Sessions</a></li>
            <li><a href="#" onclick="showSection('paid-courses')"><i class="bi bi-cash-stack"></i>&nbsp;&nbsp;&nbsp;Paid Courses</a></li>
            <li><a href="#" onclick="showSection('settings')"><i class="bi bi-gear-fill"></i>&nbsp;&nbsp;&nbsp;Settings</a></li>
            <li style="margin-top: 170px;"><a href="#" ><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
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
        <section class="content" id="externalSession">
            <div class="headerImage">
                <img class="img-fluid" src="/KuppiMate/public/images/headerImage.png" alt="header-image">
            </div>
            <div class="header">
                <h4>Browse For External Courses</h4>
                <p>Join courses conducted by undergraduates at a low cost</p>
            </div>
            <div class="courseContent">
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
                                            <button type="button" class="btn btn-primary mt-2">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        <input type="number" class="rating-value" readonly><br />
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
                                        <input type="number" class="rating-value" readonly><br />
                                        <input type="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="settings">
            <div class="container mt-5">
                <h4>Profile Details</h4>
                <div class="d-flex mb-3 mt-4">
                    <div class="p-2 flex-fill">
                        <table>
                            <tr>
                                <td class="fw-bold pb-3">First Name:</td>
                                <td class="ps-4 pb-3">Yeran</td>
                            </tr>
                            <tr>
                                <td class="fw-bold pb-3">Last Name:</td>
                                <td class="ps-4 pb-3">Lakvidu</td>
                            </tr>
                            <tr>
                                <td class="fw-bold pb-3">University Name:</td>
                                <td class="ps-4 pb-3">Uva Wellassa University</td>
                            </tr>
                            <tr>
                                <td class="fw-bold pb-3">Email:</td>
                                <td class="ps-4 pb-3">designs.yeran@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="fw-bold pb-3">Contact:</td>
                                <td class="ps-4 pb-3">0710619833</td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-2 flex-fill "></div>
                </div>
            </div>
            <div class="container">
                <form class="row g-3">
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
                        <label for="uni" class="form-label">University</label>
                        <select id="uni" name="uni" class="form-select">
                            <option>Please Select Your University</option>
                            <option value="Uva Wellassa University">Uva Wellassa University</option>
                            <option value="University of Colombo">University of Colombo</option>
                            <option value="University of Peradeniya">University of Peradeniya</option>
                            <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                            <option value="University of Kelaniya">University of Kelaniya</option>
                            <option value="University of Moratuwa">University of Moratuwa</option>
                            <option value="University of Jaffna">University of Jaffna</option>
                            <option value="University of Ruhuna">University of Ruhuna</option>
                            <option value="Eastern University, Sri Lanka">Eastern University, Sri Lanka</option>
                            <option value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                            <option value="Rajarata University of Sri Lanka">Rajarata University of Sri Lanka</option>
                            <option value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                            <option value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                            <option value="University of the Visual and Performing Arts">University of the Visual and Performing Arts</option>
                            <option value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of Indigenous Medicine</option>
                            <option value="University of Vavuniya">University of Vavuniya</option>
                        </select>
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
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
                <form class="row g-3 mt-3">
                    <div class="class-md-12">
                        <h4>Change the Login Password</h4>
                    </div>
                    <div class="col-md-4">
                        <label for="pr-password" class="form-label">Current Password</label>
                        <input type="password" name="pr-password" class="form-control" id="pr-password" required>
                    </div>
                    <div class="col-md-4">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" name="pr-password" class="form-control" id="new-password" required>
                    </div>
                    <div class="col-md-4">
                        <label for="con-password" class="form-label">Confirm New Password</label>
                        <input type="password" name="con-password" class="form-control" id="con-password" required>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="/KuppiMate/public/js/Ex-dashboard.js?v=<?php echo time(); ?>"></script>
</body>

</html>