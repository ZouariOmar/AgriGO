document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('categoryForm');
    const typeInput = document.getElementById('type');
    const submitButton = form.querySelector('button[type="submit"]');
    const errorMessage = document.getElementById('typeError');

    function validateType() {
        const validTypes = ['job', 'lending', 'produce'];
        const currentValue = typeInput.value.toLowerCase().trim();
        
        if (validTypes.includes(currentValue)) {
            errorMessage.style.display = 'none';
            submitButton.disabled = false;
            return true;
        } else {
            errorMessage.textContent = 'Le type doit être "job", "lending" ou "produce".';
            errorMessage.style.display = 'block';
            submitButton.disabled = true;
            return false;
        }
    }

    typeInput.addEventListener('input', validateType);

    form.addEventListener('submit', function(event) {
        if (!validateType()) {
            event.preventDefault();
        }
    });
});

