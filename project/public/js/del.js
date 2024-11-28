/** @format */

function accountDeactivation() {
	var del_check = document.getElementById("accountActivation");

	if (del_check.checked) {
		document.getElementById("accountDeactivate").disabled = false; // Enable
	} else {
		document.getElementById("accountDeactivate").disabled = true; // Disable
	}
}
