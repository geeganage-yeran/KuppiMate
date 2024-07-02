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
    <div class="sideBar">
        <div class="profile">
            <h2>Yeran</h2><br>

            
        </div>
        <ul class="navLinks">
            <li><a href="#" onclick="showSection('home')" class="active"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="#" onclick="showSection('createKuppi')"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;&nbsp;Create a Kuppi</a></li>
            <li><a href="#" onclick="showSection('joinKuppi')"><i class="bi bi-person-workspace"></i>&nbsp;&nbsp;&nbsp;Join for a Kuppi</a></li>
            <li><a href="#" onclick="showSection('externalSession')"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;&nbsp;External Tutor Session</a></li>
            <li><a href="#" onclick="showSection('paid-courses')"><i class="bi bi-gear-fill"></i></i>&nbsp;&nbsp;&nbsp;Paid Courses</a></li>
            <li><a href="#" onclick="showSection('settings')"><i class="bi bi-gear-fill"></i></i>&nbsp;&nbsp;&nbsp;Settings</a></li>
            <li><a href="#"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;Log out</a></li>
        </ul>
    </div>
    <div class="mainContainer">
        <header>
            <h1 id="header-title"></h1>
            <img src="/KuppiMate/public/images/logo.png" alt="Logo">
        </header>
        <section class="content" id="home">
            <div class="home-container1"></div>
            <div class="home-container2">
                <div>
                    <i class="bi bi-person-workspace"></i>
                    <p class="home-container-p">How to join for a Kuppi</p>
                    <p> Just click on the Join for a kuppi and you can join for any Kuppi session in srilanka government uuniversities</p> 
                </div>
                <div>
                    <i class="bi bi-people-fill"></i>
                    <p class="home-container-p">How to shedule a Kuppi</p>
                    <p>Just click on the Join for a kuppi and you can join for any Kuppi session in srilanka government uuniversities</p>
                </div>
                <div>
                    <i class="bi bi-person-lines-fill"></i>
                    <p class="home-container-p">About external session</p>
                    <p>Just click on the Join for a kuppi and you can join for any Kuppi session in srilanka government uuniversities</p>
                </div>
                <div>
                    <i class="bi bi-person-video3"></i>
                    <p class="home-container-p">Join for a external session</p>
                    <p>Just click on the Join for a kuppi and you can join for any Kuppi session in srilanka government uuniversities</p>
                </div>
                <div>
                    <i class="bi bi-question-lg"></i>
                    <p class="home-container-p">Any question</p>
                    <p>Just click on the Join for a kuppi and you can join for any Kuppi session in srilanka government uuniversities</p>
                </div>
            </div>
        </section>
        <section class="content" id="createKuppi">
            <div class="createKuppiContainer">
                <div class="createKuppiContainer1"></div>
                <div id="createKuppiHeading">Schedule your Kuppi Session</div>
                <div id="CreateKuppiTitle">
                    <label>Session Title</label><br>
                    <input type="text" name="tName" required autocomplete="off">
                </div>
                <div id="CreateKuppiFrom">
                    <label>Time and Date</label><br>
                    <input class="Kdate Kuppifrom" type="date" name="KuppiDate">
                    <input class="Ktime Kuppifrom" type="time" name="Kuppitime">
                    <label>to</label>
                    <input class="Kdate Kuppito" type="date" name="KuppiDate">
                    <input class="Ktime Kuppifrom" type="time" name="Kuppitime" >
                </div>
                <div id="selectCategory">
                    <label>Session Category</label><br>
                    <select name="category" id="category">
                        <option>Select the Category</option>
                        <option value="#">Category 1</option>
                        <option value="#">Category 2</option>
                        <option value="#">Category 3</option>
                        <option value="#">Category 4</option>
                    </select>
                </div>
                <div class="textArea">
                    <label class="maxChar">Session Description</label><br>
                    <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..."></textarea>
                </div>
                <div id="FileUpload">
                <label>Upload Your Kuppi Materials</label><br>
                    <input type="file" multiple>
                </div>
                <div id="CreateSection">
                    <button>Cancle</button>
                    <button>Create Kuppi</button>
                </div>
                <div id="kuppiResultsection" >
                    <div>
                        <label class="blocks">Session Title Goes Here</label>
                        <br/>
                        <label class="Bvalue">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage</label>
                        <label class="blocks">Date/Time :&nbsp; </label>
                        <label class="Bvalue">06/13/2024  |  12.00PM to 06/13/2024  |  12.00PM</label>
                        <br/>
                        <label class="blocks">Approval Status :&nbsp;</label>
                        <label class="Bvalue red">Pending</label><br>
                        <label class="blocks">Session Link :&nbsp; </label>
                        <label class="Bvalue">Link will display here</label><br>
                        <button class="btn btn-outline-danger">Delete</button>
                        <button class="btn btn-outline-primary reshedule" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Reschedule</button>
                        <button class="btn btn-outline-success" >Proceed</button>
                        <p>Approval process will complete within few minutes</p>
                    </div>
                    <div>
                        <label class="blocks">Session Title Goes Here</label>
                        <br/>
                        <label class="Bvalue">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage</label>
                        <label class="blocks">Date/Time :&nbsp; </label>
                        <label class="Bvalue">06/13/2024  |  12.00PM to 06/13/2024  |  12.00PM</label>
                        <br/>
                        <label class="blocks">Approval Status :&nbsp;</label>
                        <label class="Bvalue red">Pending</label><br>
                        <label class="blocks">Session Link :&nbsp; </label>
                        <label class="Bvalue">Link will display here</label><br>
                        <button class="btn btn-outline-danger">Delete</button>
                        <button class="btn btn-outline-primary reshedule" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Reschedule</button>
                        <button class="btn btn-outline-success" >Proceed</button>
                        <p>Approval process will complete within few minutes</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="joinKuppi">
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
                    <button class="btn btn-primary btn-sm" id="clearButton" >Clear All</button>
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
                            <button class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target="#universityKuppi" >View Kuppis</button>
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
                            <span>South Eastern University<br/>of Sri Lanka</span>
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
                            <span>Sabaragamuwa University<br/>of Sri Lanka</span>
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
            <div  class="header">
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
                                <label>Yeran Lakvidu</label><br/>
                                <label class="time-period">3 Months , 25 Lectures</label><br/>
                                <label class="ratingval">4.2</label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label>(37)</label>
                                <p>LKR 6000.00</p>
                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/KuppiMate/public/images/progs.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Course Title Here</h5>
                                <label>Yeran Lakvidu</label><br/>
                                <label class="time-period">3 Months , 25 Lectures</label><br/>
                                <label class="ratingval">4.2</label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label>(37)</label>
                                <p>LKR 6000.00</p>
                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/KuppiMate/public/images/progs.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Course Title Here</h5>
                                <label>Yeran Lakvidu</label><br/>
                                <label class="time-period">3 Months , 25 Lectures</label><br/>
                                <label class="ratingval">4.2</label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label>(37)</label>
                                <p>LKR 6000.00</p>
                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/KuppiMate/public/images/progs.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Course Title Here</h5>
                                <label>Yeran Lakvidu</label><br/>
                                <label class="time-period">3 Months , 25 Lectures</label><br/>
                                <label class="ratingval">4.2</label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label class="bi bi-star-fill"></label>
                                <label>(37)</label>
                                <p>LKR 6000.00</p>
                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                
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
                            <span id="heading1">Get Approval and Start<br/>
                                <span id="heading2">Earning Now</span>
                            </span>
                            <a href="#" data-bs-target="#ApprovalForm" data-bs-toggle="modal" class="btn btn-primary">Get Approval</a>
                            <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            <span class="extraContent">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br/>
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
                                <h5 class="modal-title" id="staticBackdropLabel">Reschedule your Kuppi Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                                <form action="#">
                                    <div>
                                        <label>Course Title</label><br/>
                                        <input type="text"name="cTitle" required autocomplete="off"></br>
                                        <label>Time period</label><br/>
                                        <input type="text"name="cTime" required autocomplete="off">
                                    </div>
                                    <div class="textArea">
                                        <label>About Course</label><br/>
                                        <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div class="textArea">
                                        <label>Course Content</label><br/>
                                        <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div class="textArea">
                                        <label>Tell Something About You</label><br/>
                                        <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>
                                    <div id="FileUpload">
                                        <label>Upload Your Kuppi Materials</label><br>
                                        <input type="file" multiple>
                                    </div>    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" >Request Approval</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="paid-courses">
            <div class="createKuppiContainer">
                <div class="createKuppiContainer1"></div>
            </div>
            <div class="tutorDetails">
                <h5>Contact Course Tutor</h5>
                <span>Name :</span>
                <span>Name goes Here</span></br>
                <span>Conatct Number :</span>
                <span>0710619833</span><br/>
                <span>Email :</span>
                <span>designs.yeran@gmail.com</span><br/>
                <span>University Name :</span>
                <span>Uva Wellassa University</span>
            </div>
            <div class="addReview">
                <h5>Add a Review about the Course</h5>
                <textarea class="description form-control form-control-sm" name="description" rows="6" cols="80" maxlength="100" placeholder="Max Characters 100..." required></textarea></br>
                <span>Rating&nbsp;</span>
                <form class="star-rating">
                    <input class="radio-input" type="radio" id="star1" name="star-input" value="5" />
                    <label class="bi bi-star-fill" for="star1" title="1 stars"></label>

                    <input class="radio-input" type="radio" id="star2" name="star-input" value="4" />
                    <label class="bi bi-star-fill" for="star2" title="2 stars"></label>

                    <input class="radio-input" type="radio" id="star3" name="star-input" value="3" />
                    <label class="bi bi-star-fill" for="star3" title="3 stars"></label>

                    <input class="radio-input" type="radio" id="star4" name="star-input" value="2" />
                    <label class="bi bi-star-fill" for="star4" title="4 stars"></label>

                    <input class="radio-input" type="radio" id="star5" name="star-input" value="1" />
                    <label class="bi bi-star-fill" for="star5" title="5 star"></label>
                </form>
            </div>
        </section>
        <section class="content" id="settings">
            <div class="setting-container">            
                <div class="setting-container1"></div>
                <div class="edit-header"><p>Edit Profile</p></div>
                <div>
                    <label>First Name</label><br>
                    <input type="text" name="fName" required autocomplete="off">
                </div>
                <div>
                    <label>Last Name</label><br>
                    <input type="text" name="lName" required autocomplete="off">
                </div>
                <div>
                    <label>University Name</label><br>
                    <!--<input type="text" name="uUniversity" required autocomplete="off">-->
                    <select name="universities" id="universities">
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
                <div>
                    <label> Email</label><br>
                    <input type="email" name="uEmail" required autocomplete="off">
                </div>
                <div>
                    <label>Contact</label><br>
                    <input type="text" name="uContact" required maxlength="10" autocomplete="off">
                </div>
                <div>
                </div>
                <div class="setting-button">
                    <button>Cancle</button>
                    <button>Update Profile</button>
                </div>
                <div class="edit-header"><p>Change the Login password</p></div>
                <div class="update-password">
                    <label>Current Password</label><br>
                    <input type="password" name="cPassword" autocomplete="off">
                </div>
                <div>
                    <label>New Password</label><br>
                    <input type="password" name="cPassword" autocomplete="off">
                    <p class="update-password-instruction">The new password must have at least 6 characters, at least 
                1 digit(s),at least 1 lower case letter(s), at least 1 upper case letter(s)</p>
                </div>
                <div>
                    <label>New Password Again</label><br>
                    <input type="password" name="cPassword" autocomplete="off">
                </div>
                <div></div>
                <div class="setting-button">
                    <button>Cancle</button>
                    <button>Save Password</button>
                </div>             
            </div>      
        </section>
    </div>

<!-- Popu up model in reshedule  -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Reschedule your Kuppi Session</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                    </div>
                        <div class="modal-body">
                            <form action="#">
                                    <div>
                                        <label>Session Title</label><br/>
                                        <input type="text"name="tName" required autocomplete="off">
                                    </div>
                                    <div>
                                        <label>Time and Date</label><br/>
                                        <input class="Kdate Kuppifrom" type="date" name="KuppiDate" required>
                                        <input class="Ktime Kuppifrom" type="time" name="Kuppitime" required>
                                        <label id="label-popup">to</label>
                                        <input class="Kdate Kuppito" type="date" name="KuppiDate" required>
                                        <input class="Ktime Kuppifrom" type="time" name="Kuppitime" required>
                                    </div>
                                    <div>
                                        <label>Session Category</label><br/>
                                        <select name="category"id="category" required>
                                            <option>Select the Category</option>
                                            <option value="#">Category 1</option>
                                            <option value="#">Category 2</option>
                                            <option value="#">Category 3</option>
                                            <option value="#">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="textArea">
                                        <label class="maxChar">Session Description</label><br/>
                                        <textarea class="description" name="description" rows="6" cols="50" maxlength="300" placeholder="Max Characters 300..." required></textarea>
                                    </div>      
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" >Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="/KuppiMate/public/js/dashboard.js?v=<?php echo time(); ?>"></script>
</body>
</html>