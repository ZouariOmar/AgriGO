/** @format */

const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
	container.classList.add("right-panel-active");
	document.getElementById("signInError").textContent = "";
});

signInButton.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
	document.getElementById("signUpError").textContent = "";
});

/**
 * ### Verify if the given Data are valid
 * @details Data can be Email/Username
 * ! No need to verify the password
 */
class FormatVerify {
	constructor(identifier, password, email = null) {
		this.identifier = identifier; // Either email or username for sign-in
		this.password = password; // Password for sign In/Up
		this.email = email; // Separate email for sign-up
	}

	/**
	 * Method to verify email format
	 * @returns {boolean}
	 * @param {string} email
	 */
	isValidEmail(email) {
		const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		return emailPattern.test(email);
	}

	/**
	 * Method to verify username format
	 * ! Assuming username must be alphanumeric and between 5 to 20 characters
	 * @param {string} username
	 * @returns {boolean}
	 */
	isValidUsername(username) {
		const usernamePattern = /^[a-zA-Z0-9]{5,20}$/;
		return usernamePattern.test(username);
	}

	/**
	 * Method to verify password existence
	 * ! Assuming password must be complex and at less have 8 characters
	 * @returns {boolean}
	 */
	isValidPassword() {
		const passwordPattern =
			/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
		return passwordPattern.test(this.password);
	}

	/**
	 * Method to verify identifier format
	 * ! Identifier can be Email/Username
	 * @returns {boolean}
	 */
	isValidIdentifier() {
		return (
			this.isValidEmail(this.identifier) ||
			this.isValidUsername(this.identifier)
		);
	}

	/**
	 * Method to return a custom "Sign In" error message
	 * @returns {string}
	 */
	getSignInErrorMessage() {
		return !this.isValidIdentifier()
			? "Please enter a valid email or username."
			: !this.isValidPassword()
			? "Password should be complex (a-z, A-Z, 0-9, ('/*)...) and have at less 8 characters."
			: "";
	}

	/**
	 * Method to return a custom "Sign Up" error message
	 * @returns {string}
	 */
	getSignUpErrorMessage() {
		return !this.isValidUsername(this.identifier)
			? "Username should be alphanumeric and between 5 to 20 characters."
			: !this.isValidEmail(this.email)
			? "Please enter a valid email address!"
			: !this.isValidPassword()
			? "Password must be at least 8 chars, include A-Z, a-z, 0-9, and a special character (@, $, !, %, *, ?, &)."
			: "";
	}
}

function validateSignInForm() {
	const identifier = document.getElementById("identifier").value;
	const password = document.getElementById("password2").value;

	const verifier = new FormatVerify(identifier, password);
	const errorMessage = verifier.getSignInErrorMessage();
	if (errorMessage) {
		document.getElementById("signInError").textContent = errorMessage;
		return false;
	}

	document.getElementById("signInError").textContent = ""; // Clear error
	return true;
}

function validateSignUpForm() {
	const username = document.getElementById("username").value;
	const email = document.getElementById("email").value;
	const password = document.getElementById("password1").value;

	const verifier = new FormatVerify(username, password, email);
	const errorMessage = verifier.getSignUpErrorMessage();
	if (errorMessage) {
		document.getElementById("signUpError").textContent = errorMessage;
		return false;
	}

	document.getElementById("signUpError").textContent = ""; // Clear error
	return true;
}

/**
 * Alert msg box
 */
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
	close[i].onclick = function () {
		var div = this.parentElement;
		div.style.opacity = "0";
		setTimeout(function () {
			div.style.display = "none";
		}, 600);
	};
}
