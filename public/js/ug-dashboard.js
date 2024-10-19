//showing main content

let header = document.getElementById("header-title");
function showSection(sectionId) {
    header.innerHTML = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
    header.style.color = "#0B5ED7";
    header.style.fontWeight = "700";
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
window.addEventListener("resize", HeaderVisibility);

//Text limit in Text area

document.addEventListener("DOMContentLoaded", function () {
    const textAreas = document.getElementsByClassName('description');
    const counters = document.getElementsByClassName('maxChar');
    const maxChars = 299;


    Array.from(textAreas).forEach((textArea, index) => {
        const counter = counters[index];
        const textContentSet = counter.textContent;
        if (!counter) {
            console.error(`No counter element found for text area at index ${index}`);
            return;
        }
        textArea.addEventListener('input', function () {
            const count = textArea.value.length;
            counter.textContent = textContentSet + ` ` + count + '/' + (maxChars + 1);

            if (count > maxChars) {
                textArea.style.borderColor = "red";
            } else {
                textArea.style.borderColor = "#62606080";
            }
        });
    });
});

// Notice filter section
const categorySelect = document.getElementById("category-select");
const dateFilter = document.getElementById("dateFilter");
const uniFilter = document.getElementById("uni-select");
const clearButton = document.getElementById("clearButton");

categorySelect.addEventListener("change", function () {
    if (categorySelect.value !== '') {
        dateFilter.disabled = true;
        dateFilter.style.color = "#e2e2e2";
        uniFilter.disabled = true;
        uniFilter.style.color = "#e2e2e2";
    } else {
        dateFilter.disabled = false;
        dateFilter.style.color = "#000000";
        uniFilter.disabled = false;
        uniFilter.style.color = "#000000";
    }
});

dateFilter.addEventListener("change", function () {
    if (dateFilter.value !== '') {
        categorySelect.disabled = true;
        categorySelect.style.color = "#e2e2e2";
        uniFilter.disabled = true;
        uniFilter.style.color = "#e2e2e2";
    } else {
        categorySelect.disabled = false;
        categorySelect.style.color = "#000000";
        uniFilter.disabled = false;
        uniFilter.style.color = "#000000";
    }
});

uniFilter.addEventListener("change", function () {
    if (uniFilter.value !== '') {
        categorySelect.disabled = true;
        categorySelect.style.color = "#e2e2e2";
        dateFilter.disabled = true;
        dateFilter.style.color = "#e2e2e2";
    } else {
        categorySelect.disabled = false;
        categorySelect.style.color = "#000000";
        dateFilter.disabled = false;
        dateFilter.style.color = "#000000";
    }
});

clearButton.addEventListener("click", function () {
    // Reset all filters
    categorySelect.disabled = false;
    categorySelect.value = "";
    categorySelect.style.color = "#000000";

    dateFilter.disabled = false;
    dateFilter.value = "";
    dateFilter.style.color = "#000000";

    uniFilter.disabled = false;
    uniFilter.value = "";
    uniFilter.style.color = "#000000";
});



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

//accordian review section 

function rating(n, accordionIndex) {
    const stars = document.getElementsByClassName("star-" + accordionIndex);
    const ratingValue = document.querySelector(".rating-value-" + accordionIndex);

    remove(accordionIndex);

    for (let i = 0; i < n; i++) {
        let cls = "";
        if (n === 1) cls = "one";
        else if (n === 2) cls = "two";
        else if (n === 3) cls = "three";
        else if (n === 4) cls = "four";
        else if (n === 5) cls = "five";

        stars[i].classList.add(cls);
    }


    ratingValue.value = n;
}

function remove(accordionIndex) {
    const stars = document.getElementsByClassName("star-" + accordionIndex);


    for (let i = 0; i < stars.length; i++) {
        stars[i].className = "star star-" + accordionIndex; // Reset the class to default
    }
}

// modal review for enrolled kuppis

function modalRating(n) {
    const modalStars = document.getElementsByClassName("modal-star");
    const modalRatingValue = document.getElementById("modal-rating-value");


    resetModalStars();


    for (let i = 0; i < n; i++) {
        modalStars[i].classList.add("selected");

        if (n === 1) {
            modalStars[i].classList.add("one");
        } else if (n === 2 || n === 3 || n === 4) {
            modalStars[i].classList.add("two", "three", "four");
        } else if (n === 5) {
            modalStars[i].classList.add("five");
        }
    }


    modalRatingValue.value = n;
}

function resetModalStars() {
    const modalStars = document.getElementsByClassName("modal-star");


    for (let i = 0; i < modalStars.length; i++) {
        modalStars[i].className = "modal-star";
    }
}



// setting previous dates off

const now = new Date();
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0');
const day = String(now.getDate()).padStart(2, '0');
const hours = String(now.getHours()).padStart(2, '0');
const minutes = String(now.getMinutes()).padStart(2, '0');


const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
document.querySelector('.Kuppifrom').setAttribute('min', minDateTime);
document.querySelector('.Kuppito').setAttribute('min', minDateTime);
document.querySelector('.Kuppifrom').addEventListener('input', function () {
    const startDate = this.value;
    document.querySelector('.Kuppito').setAttribute('min', startDate);
});


// filter validation 

function filterValidate() {
    var cat = document.getElementById('category-select').value;
    var dateFilter = document.getElementById('dateFilter').value;

    if (cat === '' && dateFilter === '') {
        alert('Select a category or date to filter notice');
        return false;
    } else {
        return true;
    }
}

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

//create kuppi validation 

function createKuppi() {
    const kTitle = document.getElementById("kTitle").value;
    const kDescription = document.getElementById("kDescription").value;
    
    const regex = /^[a-zA-Z0-9\s\-_\.(),]+$/;

    if (!kTitle.match(regex)) {
        alert('Invalid characters in kuppi title');
        return false;
    } else if (!kDescription.match(regex)) {
        alert('Invalid characters in kuppi description');
        return false;
    }
    return true;
}

//set session id for feedback

function setSessionId(button) {
    const sessionId = button.getAttribute('data-session-id');
    document.getElementById('session-id').value = sessionId;
}

//messages timeout
setTimeout(function () {
    var alertElement = document.getElementById('alertMessage');
    if (alertElement) {
        alertElement.classList.remove('show');
        setTimeout(function () {
            alertElement.remove();
        }, 300);
    }
}, 5000);

//external course registration form validation

function validateExternalCourseForm() {
    var courseTitle = document.getElementById('cTitle').value.trim();
    var timePeriod = document.getElementById('cTime').value.trim();
    var description = document.getElementById('description').value.trim();
    var courseFee = document.getElementById('cFee').value.trim();
    var courseContent = document.getElementById('descriptionC').value.trim();
    var aboutYou = document.getElementById('descriptionA').value.trim();

    if (!courseTitle) {
        alert('Course Title is required.');
        return false;
    } else if (!timePeriod) {
        alert('Time Period is required.');
        return false;
    } else if (!description) {
        alert('Course Description is required.');
        return false;
    } else if (courseFee && isNaN(courseFee)) {
        alert('Course Fee must be a valid number.');
        return false;
    } else if (!courseContent) {
        alert('Course Content is required.');
        return false;
    } else if (!aboutYou) {
        alert('Personal Description is required.');
        return false;
    }

    return true;
}

//external tutor session delete confirmation
var externalSessionConfirmModal = document.getElementById('externalSessionDeleteConfirm');
externalSessionConfirmModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var sessionId = button.getAttribute('data-session-id');
    var session_id_input = document.getElementById('delete_session_id_set');
    session_id_input.value = sessionId;
})

//courses buynow details display 
const enrollButtons = document.querySelectorAll('.enroll-button[data-bs-toggle="modal"]');

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
        document.getElementById('tutor-fee').innerText = 'LKR:' + tutorFee + '.00';

        // Set hidden input value
        document.getElementById('course-id').value = courseId;
        document.getElementById('course-title-set').value = courseTitle;
        document.getElementById('course-fee-set').value = tutorFee;
    });
});

//pass id to the modals

var confirmModal = document.getElementById('confirmModal');
confirmModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var deleteSessionId = button.getAttribute('data-session-id');
    var deleteSessionIdSet = document.getElementById('deleteSessionIdSet');
    deleteSessionIdSet.value = deleteSessionId;
})