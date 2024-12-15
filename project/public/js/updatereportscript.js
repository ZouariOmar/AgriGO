function showError(input, message) {
  clearError(input);
  const error = document.createElement("span");
  error.textContent = message;
  error.style.color = "red"; // Set color directly
  error.className = "error-message";
  input.parentNode.insertBefore(error, input.nextSibling);
}

// Function to clear error message
function clearError(input) {
  const error = input.parentNode.querySelector(".error-message");
  if (error) {
    error.remove();
  }
}

// Event listener for form submission
document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    let valid = true;

    // Check category selection
    const category = form.querySelector("#category");
    if (category.value === "") {
      showError(category, "Please select a category.");
      valid = false;
    } else {
      clearError(category);
    }

    // Check subject input
    const subject = form.querySelector("#subject");
    if (!subject.value.trim()) {
      showError(subject, "Please enter a subject.");
      valid = false;
    } else {
      clearError(subject);
    }

    // Check description input
    const description = form.querySelector("#description");
    if (!description.value.trim()) {
      showError(description, "Please enter a description!");
      valid = false;
    } else {
      clearError(description);
    }

    // Submit the form with confirmation if all fields are valid
    if (valid) {
      const confirmation = confirm("Are you sure you want to update the report?");
      if (confirmation) {
        form.submit(); // Proceed with form submission
      }
    }
  });
});