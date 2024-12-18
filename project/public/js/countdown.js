/**
 * @format
 * @author @ZouariOmar
 */

let countdown = 5;
const countdownElement = document.getElementById("countdown");
const user_id_input = document.getElementById("user_id");
const user_id = user_id_input ? user_id_input.value : null;

if (!user_id) console.error("User ID is missing or invalid");
else {
	// Start a countdown interval
	const interval = setInterval(() => {
		if (countdownElement) {
			countdownElement.textContent = countdown; // Update countdown text
		}
		countdown--;
		if (countdown <= 0) {
			clearInterval(interval); // Stop the interval at 0
			countdown = 0; // Prevent negative values
		}
	}, 1000); // Update every 1 second

	// Redirect to the home page after timeout
	setTimeout(() => {
		window.location.href = `../Views/index.php?id=${user_id}`;
	}, countdown * 1000);
}
