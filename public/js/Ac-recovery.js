// Function to show/hide sections
function showSection(sectionId) {
    const sections = document.querySelectorAll('.container');
    sections.forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById(sectionId).classList.remove('hidden');
}

// Function to go back to the previous section
function goBack(previousSectionId) {
    showSection(previousSectionId);
}

// Code to handle input and navigation between code input fields
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

// Handle form submission
document.getElementById('reset-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // Show the verification code container immediately
    showSection('verify-code-container');

    // Update the email display
    document.getElementById('user-email').textContent = formData.get('email');

    // You can continue with email processing here
    // Note: This part is executed regardless of whether the email sending is successful or not
    fetch('send-code.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to send email: ' + response.statusText); // Handle non-200 response
        }
        return response.json(); // Parse JSON response
    })
    .then(data => {
        if (data.status !== 'success') {
            console.error('Failed to send email: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the email: ' + error.message); // Display error message in alert
    });
});