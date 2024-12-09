document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const textarea = document.getElementById("response");
    const errorMessage = document.createElement("p");
    errorMessage.style.color = "red";
    errorMessage.style.display = "none";
    errorMessage.textContent = "Error: Response cannot be empty.";
    form.insertBefore(errorMessage, form.firstChild);

    form.addEventListener("submit", function(event) {
        if (textarea.value.trim() === "") {
            errorMessage.style.display = "block";
            event.preventDefault(); // Prevent form submission
        } else {
            errorMessage.style.display = "none";
        }
    });
});