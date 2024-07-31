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
