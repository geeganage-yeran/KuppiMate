//showing main content

let header = document.getElementById("header-title");
function showSection(sectionId) {
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

//notice filter section
const categorySelect = document.getElementById("category-select");
const dateFilter = document.getElementById("dateFilter");
const clearButton = document.getElementById("clearButton");

categorySelect.addEventListener("change", function () {
    if (categorySelect.value !== 'All') {
        dateFilter.disabled = true;
        dateFilter.style.color = "#e2e2e2";
    } else {
        dateFilter.disabled = false;
        dateFilter.style.color = "#000000";
    }
})
dateFilter.addEventListener("change", function () {
    if (dateFilter.value) {
        categorySelect.disabled = true;
        categorySelect.value = "";
    } else {
        categorySelect.disabled = false;
    }
})
clearButton.addEventListener("click", function () {
    categorySelect.disabled = false;
    categorySelect.value = "all";
    dateFilter.disabled = false;
    dateFilter.value = "";
    dateFilter.style.color = "#000000"
})

//Readmore Functionality
document.getElementById('readMoreBtn').addEventListener('click', function () {
    var extraContent = document.querySelector('.extraContent');
    if (extraContent.style.display === 'none') {
        extraContent.style.display = 'inline';
        this.textContent = 'ReadLess';
    } else {
        extraContent.style.display = 'none';
        this.textContent = 'ReadMore';
    }
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
    ratingValue.value =  n;
}
 
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}

