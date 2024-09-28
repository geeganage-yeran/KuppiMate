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

//Rating Process
const stars = document.getElementsByClassName("star");
const ratingValue = document.getElementById("rating-value");

function rating(n) {
    remove();
    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        stars[i].className = "star " + cls;
    }
    ratingValue.value = n;
}

function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
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
    }
},5000);

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
