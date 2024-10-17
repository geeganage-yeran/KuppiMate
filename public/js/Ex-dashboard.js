//showing main content

let header = document.getElementById("header-title");
function showSection(sectionId) {
    console.log(sectionId);
    header.innerHTML = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
    header.style.color="#0B5ED7";
    header.style.fontWeight="700";
    document.querySelectorAll('.content').forEach(section => {
        section.classList.remove('active');
    });
    document.querySelectorAll('.navLinks a').forEach(link => {
        link.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
    document.querySelector(`.navLinks a[onclick="showSection('${sectionId}')"]`).classList.add('active');
}
showSection('home');
function HeaderVisibility() {
    header.style.display = (window.innerWidth <= 768) ? "none" : "block";
}
HeaderVisibility();
window.addEventListener("resize",HeaderVisibility);

//settings validate
function validateSetting() {
    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const email = document.getElementById("email").value;
    const contact = document.getElementById("contact").value;

    if (fname == '' && lname == '' && email == '' && contact == '') {
        alert('At least one field should be filled to update the profile');
        return false;
    } else if (fname !== '' && !fname.match(/^[a-zA-Z]+$/)) {
        alert('Invalid characters in first name field');
        return false;
    } else if (lname !== '' && !lname.match(/^[a-zA-Z]+$/)) {
        alert('Invalid characters in last name field');
        return false;
    } else if (email !== '' && !email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
        alert('Invalid characters in email');
        return false;
    } else if (contact !== '' && !contact.match(/^\d{10}$/)) {
        alert('Invalid contact number use the format as 07XXXXXXXX');
        return false;
    }
    return true;

}


//Ham menue
const hambMenu = document.getElementById("hambMenu");
const sideBar = document.getElementById("sidebar");
const closeMenue = document.getElementById("closeMenue");

hambMenu.addEventListener("click", function () {
    sideBar.classList.toggle("show");
});
closeMenue.addEventListener("click", function () {
    sideBar.classList.remove("show");
});

// Rating Process
function rating(n, accordionIndex) {
    const stars = document.getElementsByClassName("star");
    const ratingValue = document.getElementsByClassName("rating-value");
    
    remove(accordionIndex);
    
    // Change class for stars within the current accordion
    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        stars[accordionIndex * 5 + i].className = "star " + cls; // Adjust index to target the correct stars
    }
    
    // Update the rating value for the current accordion
    ratingValue[accordionIndex].value = n; // Set the value of the rating input
}

function remove(accordionIndex) {
    const stars = document.getElementsByClassName("star");
    
    // Reset the stars within the current accordion
    for (let i = accordionIndex * 5; i < accordionIndex * 5 + 5; i++) {
        stars[i].className = "star"; // Reset the class to default
    }
}


var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})


//courses buynow details display 
const enrollButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

enrollButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Get data from button
        const courseId = this.getAttribute('data-session-id');
        const description = this.getAttribute('data-description');
        const courseContent = this.getAttribute('data-course-content');
        const aboutTutor = this.getAttribute('data-about-tutor');
        const tutorFee = this.getAttribute('data-tutor-fee');
        const courseTitle = this.getAttribute('data-session-title');
        // Update modal content
        document.getElementById('staticBackdropLabel').innerText = courseTitle; // or use a specific title if available
        document.getElementById('course-description').innerText = description;
        document.getElementById('course-content').innerText = courseContent;
        document.getElementById('about-tutor').innerText = aboutTutor;
        document.getElementById('tutor-fee').innerText = 'LKR:'+tutorFee+'.00';

        // Set hidden input value
        document.getElementById('course-id').value = courseId;
        document.getElementById('course-title-set').value = courseTitle;
        document.getElementById('course-fee-set').value = tutorFee;
    });
});

//message timeout settings

setTimeout(function () {
    var alertElement = document.getElementById('alertMessage');
    if (alertElement) {
        alertElement.classList.remove('show');
        setTimeout(function () {
            alertElement.remove();
        }, 300);
    }
}, 5000);