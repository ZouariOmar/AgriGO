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
	 * ! Assuming password must be complex and at less have 10 characters
	 * @returns {boolean}
	 */
	isValidPassword() {
		const passwordPattern = /^[a-zA-Z0-9]{10,20}$/;
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
			? "Password should be complex (a-z, A-Z, 0-9, ('/*)...) and have at less 10 characters."
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
			? "Please enter a valid email address."
			: !this.isValidPassword()
			? "Password should be complex (a-z, A-Z, 0-9, ('/*)...) and have at less 10 characters."
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
	alert("Sign-In successful!");
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
	alert("Sign-Up successful!");
	return true;
}
