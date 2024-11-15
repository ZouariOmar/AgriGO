/**
 * @author @ZouariOmar
 */

let countdown = 5;
const countdownElement = document.getElementById("countdown");

// Start a countdown interval
const interval = setInterval(() => {
	countdown--;
	countdownElement.textContent = countdown; // Update countdown text
	if (countdown === 0)
		clearInterval(interval); // Stop the interval when it reaches 0
}, 1000); // Update every 1 second

// Redirect to the home page after timeout
setTimeout(() => {
	window.location.href = "../../public/html/contact.html";
}, countdown * 1000);
