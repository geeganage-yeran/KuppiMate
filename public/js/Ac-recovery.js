document.addEventListener('DOMContentLoaded', () => {
    const codeInputs = document.querySelectorAll('.code-input');

    codeInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            input.classList.add('highlight');
            if (e.target.value.length === 1 && index < codeInputs.length - 1) {
                codeInputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && index < codeInputs.length - 1) {
                codeInputs[index + 1].focus();
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var message = document.getElementById('otpMessage');

    if (message) {
        setTimeout(function () {
            message.style.display = 'none';
        }, 3000);
    }
});

function validateUpdatePassword() {
    var password = document.getElementById('uPassword').value;
    var confirmPassword = document.getElementById('cPassword').value;

    if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/)) {
        alert('Password should contain at least one uppercase letter, one lowercase letter, one special character, and a minimum length of 8');
        return false;
    } else if (password !== confirmPassword) {
        alert('password does not match');
        return false;
    }
    return true;
}
