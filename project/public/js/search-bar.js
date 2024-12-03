/** @format */

// Search-bar real time function
document.getElementById("searchBar").addEventListener("input", function () {
	const searchTerm = this.value.toLowerCase();
	const rows = document.querySelectorAll(".user-row");

	rows.forEach((row) => {
		const usernameCell = row.querySelector(".username");
		const emailCell = row.querySelector(".email");
		const createdAtCell = row.querySelector(".created_at");
		const updatedAtCell = row.querySelector(".updated_at");
		const statusCell = row.querySelector(".status");

		const username = usernameCell.textContent.toLowerCase();
		const email = emailCell.textContent.toLowerCase();
		const created_at = createdAtCell.textContent.toLowerCase();
		const updated_at = updatedAtCell.textContent.toLowerCase();
		const status = statusCell.textContent.toLowerCase();

		if (
			username.includes(searchTerm) ||
			email.includes(searchTerm) ||
			status.includes(searchTerm) ||
			created_at.includes(searchTerm) ||
			updated_at.includes(searchTerm)
		) {
			row.style.display = "";  // Show row

			// Highlight matching text in each relevant cell
			highlightText(usernameCell, searchTerm);
			highlightText(emailCell, searchTerm);
			highlightText(createdAtCell, searchTerm);
			highlightText(updatedAtCell, searchTerm);
			highlightText(statusCell, searchTerm);
		} else row.style.display = "none";  // Hide row
	});
});

/**
 * Highlights the search term within the given element.
 * @param {HTMLElement} element - The cell element to highlight.
 * @param {string} searchTerm - The term to highlight.
 */
function highlightText(element, searchTerm) {
	const text = element.textContent; // Original text
	const regex = new RegExp(`(${searchTerm})`, "gi"); // Match search term (case insensitive)

	if (searchTerm) {
		element.innerHTML = text.replace(
			regex,
			'<span class="highlight">$1</span>'
		);
	} else element.innerHTML = text; // Reset to original if no search term
}
