document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('categoryForm');
    const typeInput = document.getElementById('type');
    const submitButton = form.querySelector('button[type="submit"]');
    const errorMessage = document.getElementById('typeError');

    function validateType() {
        const validTypes = ['job', 'lending', 'produce'];
        const currentValue = typeInput.value.toLowerCase().trim();
        
        if (validTypes.includes(currentValue)) {
            return true;
        } else {
            displayError('Le type doit être "job", "lending" ou "produce".');
            return false;
        }
    }

    function displayError(message) {
        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
        submitButton.disabled = true;
    }

    function clearError() {
        errorMessage.style.display = 'none';
        submitButton.disabled = false;
    }

    function validateForm() {
        clearError();
        return validateType() ;
    }

    typeInput.addEventListener('input', validateForm);
    dateInInput.addEventListener('input', validateForm);
    dateOutInput.addEventListener('input', validateForm);

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});