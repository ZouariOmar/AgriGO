document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("reportForm");

  // List of bad words
  const badWords = ["badword1", "badword2", "badword3", "fuck", "shit", "bitch"]; // Add more bad words as needed

  // Function to create and display error messages
  function showError(input, message) {
      let errorLabel = input.nextElementSibling;
      
      if (!errorLabel || !errorLabel.classList.contains("error")) {
          errorLabel = document.createElement("span");
          errorLabel.className = "error";
          input.insertAdjacentElement("afterend", errorLabel);
      }
      
      errorLabel.textContent = message;
  }

  // Function to clear error messages
  function clearError(input) {
      let errorLabel = input.nextElementSibling;
      if (errorLabel && errorLabel.classList.contains("error")) {
          errorLabel.textContent = "";
      }
  }

  // Function to check for bad words
  function containsBadWords(input) {
      const inputValue = input.value.toLowerCase();
      return badWords.some(word => inputValue.includes(word));
  }

  // Form validation on submit
  form.addEventListener("submit", function(event) {
      event.preventDefault();
      let valid = true;

      // Clear all previous error messages
      document.querySelectorAll(".error").forEach(label => {
          label.textContent = "";
      });

      // Check category selection
      const category = form.querySelector("#category");
      if (!category.value || category.value === "Select Category") {
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
      } else if (containsBadWords(subject)) {
          showError(subject, "Subject contains inappropriate language.");
          valid = false;
      } else {
          clearError(subject);
      }

      // Check description input
      const description = form.querySelector("#description");
      if (!description.value.trim()) {
          showError(description, "Please enter a description.");
          valid = false;
      } else if (containsBadWords(description)) {
          showError(description, "Description contains inappropriate language.");
          valid = false;
      } else {
          clearError(description);
      }

      // Submit the form if all fields are valid
      if (valid) {
          form.submit();
      }
  });
});