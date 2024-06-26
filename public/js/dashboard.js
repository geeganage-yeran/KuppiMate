//Date limimt in create kuppi section

document.addEventListener("DOMContentLoaded", function() {
    const dateInputs = document.getElementsByClassName("Kdate");
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const minDate = `${yyyy}-${mm}-${dd}`;

    for (let i = 0; i < dateInputs.length; i++) {
        dateInputs[i].setAttribute("min", minDate);
    }
});

//showing main content

let header=document.getElementById("header-title");
function showSection(sectionId){
    header.innerHTML = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
    document.querySelectorAll('.content').forEach(section => 
        {
        section.classList.remove('active');
    });
    document.querySelectorAll('.navLinks a').forEach(link => {
        link.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
    document.querySelector(`.navLinks a[onclick="showSection('${sectionId}')"]`).classList.add('active');
}
showSection('home');

//Text limit in Text area

document.addEventListener("DOMContentLoaded", function() {
    const textAreas = document.getElementsByClassName('description');
    const counters = document.getElementsByClassName('maxChar');
    console.log(counters);
    const maxChars = 299;

    Array.from(textAreas).forEach((textArea, index) => {
        const counter = counters[index];
        textArea.addEventListener('input', function() {
            const count = textArea.value.length;
            console.log(count);
            counter.textContent = `Session Description `+count+'/'+(maxChars+1);
            
            if (count > maxChars) {
                textArea.style.borderColor = "red";
            } else {
                textArea.style.borderColor = "#62606080";
            }
        });
    });
});

//notice filter section
const categorySelect=document.getElementById("category-select");
const dateFilter=document.getElementById("dateFilter");
const clearButton=document.getElementById("clearButton");

categorySelect.addEventListener("change",function(){
    if(categorySelect.value !== 'All'){
        dateFilter.disabled=true;
        dateFilter.style.color="#e2e2e2";
    }else{
        dateFilter.disabled=false;
        dateFilter.style.color="#000000";
    }
})
dateFilter.addEventListener("change",function(){
    if(dateFilter.value){
        categorySelect.disabled=true;
        categorySelect.value="";
    }else{
        categorySelect.disabled=false;
    }
})
clearButton.addEventListener("click",function(){
    categorySelect.disabled=false;
    categorySelect.value="all";
    dateFilter.disabled=false;
    dateFilter.value="";
    dateFilter.style.color="#000000"
})