function copyText() {
    var email = document.getElementById("email");
    var emailContent = email.innerText;
    navigator.clipboard.writeText(emailContent);
}
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

function formValidate(){
    var fName=document.getElementById('fName').value.trim();
    var lName=document.getElementById('lName').value.trim();
    var password=document.getElementById('password').value;
    var rpassword=document.getElementById('rpassword').value;
    var contact=document.getElementById('contact').value.trim();
    if (!fName.match(/^[a-zA-Z'-]+$/)) {
        alert('Check your first name');
        return false;
    }else if(!lName.match(/^[a-zA-Z'-]+$/)){
        alert('Check your last name');
        return false;
    }else if(password!==rpassword){
        alert('password does not match');
        return false;
    }else if(!contact.match(/^\d{10}$/)){
        alert('Incorrect number');
        return false;
    }
    return true;
}