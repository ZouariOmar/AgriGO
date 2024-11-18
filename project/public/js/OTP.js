/** @format */

function otpVerification() {
	const email = document.getElementById("email");
	const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  (emailPattern.test(email)) ? document.getElementById("error").style.display = 'none' : document.getElementById("error").style.display = 'none';
}
