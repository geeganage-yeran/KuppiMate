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
const ratingValue = document.getElementsByClassName("rating-value");
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
    Array.from(ratingValue).forEach((ratingValue=>{
        ratingValue.innerHTML=n;
    }))
}
 
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})