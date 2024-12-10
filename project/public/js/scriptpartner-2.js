document.addEventListener("DOMContentLoaded", function() {
    // Validation de base des champs du formulaire
    const form = document.querySelector("#partner");
    form.addEventListener("submit", function(event) {
        let error = false;
        const name = document.querySelector("#name");
        const email = document.querySelector("#email");
        const number = document.querySelector("#number");
        const status = document.querySelector("#status");

        // Vérification des champs requis
        if (name.value.trim() === "") {
            alert("Partner Name is required.");
            error = true;
        }

        if (email.value.trim() === "") {
            alert("Email is required.");
            error = true;
        } else if (!validateEmail(email.value)) {
            alert("Please enter a valid email.");
            error = true;
        }

        if (number.value.trim() === "") {
            alert("Phone number is required.");
            error = true;
        }

        if (status.value === "") {
            alert("Please select a status.");
            error = true;
        }

        if (error) {
            event.preventDefault(); // Prevent form submission if there are errors
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});
// Toggle dark/light mode
document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    // Change the button text based on the mode
    if (document.body.classList.contains('dark-mode')) {
        this.textContent = 'Switch to Light Mode';
    } else {
        this.textContent = 'Switch to Dark Mode';
    }
});