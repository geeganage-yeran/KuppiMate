function copyText() {
    var email = document.getElementById("email");
    var emailContent = email.innerText;
    navigator.clipboard.writeText(emailContent);
}
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

function formValidate1(){
    var fName=document.getElementById('fName').value.trim();
    var lName=document.getElementById('lName').value.trim();
    var password=document.getElementById('password').value;
    var rpassword=document.getElementById('rpassword').value;
    var contact=document.getElementById('contact').value.trim();
    var uniId=document.getElementById('uniSelection').value;
    if (!fName.match(/^[a-zA-Z'-]+$/)) {
        alert('Check your first name');
        return false;
    }else if(!lName.match(/^[a-zA-Z'-]+$/)){
        alert('Check your last name');
        return false;
    }else if(!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#]).{8,}$/)){
        alert('Password should contain at least one uppercase letter, one lowercase letter, one special character, and a minimum length of 8');
        return false;
    }else if(password!==rpassword){
        alert('password does not match');
        return false;
    }else if(!contact.match(/^\d{10}$/)){
        alert('Incorrect number');
        return false;
    }else if(uniId==''){
        alert('Select a Valid University Name');
        return false;
    }
    return true;
}

function formValidate2(){
    var fName2=document.getElementById('fName2').value.trim();
    var lName2=document.getElementById('lName2').value.trim();
    var password2=document.getElementById('password2').value;
    var rpassword2=document.getElementById('rpassword2').value;
    var contact2=document.getElementById('contact2').value.trim();
    if (!fName2.match(/^[a-zA-Z'-]+$/)) {
        alert('Check your first name');
        return false;
    }else if(!lName2.match(/^[a-zA-Z'-]+$/)){
        alert('Check your last name');
        return false;
    }else if(!password2.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#]).{8,}$/)){
        alert('Password should contain at least one uppercase letter, one lowercase letter, one special character, and a minimum length of 8');
        return false;
    }else if(password2!==rpassword2){
        alert('password does not match');
        return false;
    }else if(!contact2.match(/^\d{10}$/)){
        alert('Incorrect number');
        return false;
    }
    return true;
}


//enable submit button when check the checkbox

function enableSubmit1(){
    document.getElementById("submitBtn1").disabled=false;
}
function enableSubmit2(){
    document.getElementById("submitBtn2").disabled=false;
}