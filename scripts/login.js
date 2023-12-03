document.addEventListener("DOMContentLoaded", () => {
	// When submit button is clicked, get inputs and then validate them
	document.getElementById("loginBtn").addEventListener("click", submitHandler );  
});

// Grabs the values from the form fields. No validation is done at this point. 
function getFormInputs() {
	// Create an object and add each value from the form to it
	const inputs = {};
	inputs.username = document.getElementById("username").value.trim();
	inputs.password = document.getElementById("password").value.trim();
	
	return inputs;
}

// Checks the inputs and returns a string describing first issue found. 
function validateInputs(inputs) {
	if (inputs.username === "") {
		return "You must enter a username.";
	} else if (inputs.password === "") {
		return "You must enter a password.";
	} 
	
	// If no issues, return. 
	return "";
}

function submitHandler(e) {
	
	// Disable the submit button. 
	const loginBtn = document.getElementById("loginBtn");
	loginBtn.disabled = true;
	
	// Clear the field that displays errors. 
	const validation = document.getElementById("validationDiv");
	validation.textContent = "";
	
	// Get the inputs. 
	const inputs = getFormInputs();
	
	// Validate the inputs. 
	validateString = validateInputs(inputs);
	
	// If there was an error, display it and return. Otherwise, send the inputs 
	// to local storage and display them and a success message on the screen. 
	if (validateString !== "") {
		validation.textContent = validateString;
		loginBtn.disabled = false;
		return;
	} else {
		const inputJSON = JSON.stringify(inputs);
		validation.textContent = "Submission successful.";
	}
	
	// Re-enable the submit button. 
	loginBtn.disabled = false;
}