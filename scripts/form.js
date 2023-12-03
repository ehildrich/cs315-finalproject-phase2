document.addEventListener("DOMContentLoaded", () => {
	// When submit button is clicked, get inputs and then validate them
	document.getElementById("submitBtn").addEventListener("click", submitHandler );  
	
	// Check the local storage to see if the form has been submitted before.
	// If so, display it. 
	if (localStorage.getItem("recentInputs")) {
		displayRecentInputs();
	}
});

// Grabs the values from the form fields. No validation is done at this point. 
function getFormInputs() {
	// Create an object and add each value from the form to it
	const inputs = {};
	inputs.cups = document.getElementById("number").value.trim();
	inputs.flavor = document.getElementById("flavor").value;
	
	// Roll through the radio buttons to find the one that was selected.
	// Start with blank value to ensure one exists
	inputs.continent = "";
	continents = document.getElementsByClassName("continentRadio");
	for (i = 0; i < continents.length; i++) {
		if (continents[i].checked) {
			inputs.continent = continents[i].value;
		}
	}
	
	return inputs;
}

// Checks the inputs and returns a string describing first issue found. 
function validateInputs(inputs) {
	if (inputs.cups === "") {
		return "You must enter a number of cups.";
	} else if (isNaN(inputs.cups)) {
		return "Cups must be a valid number.";
	}  else if (inputs.flavor === "") {
		return "You must choose a favorite flavor.";
	} else if (inputs.continent === "") {
		return "You must choose a continent.";
	}
	
	// If no issues, return. 
	return "";
}

// Displays the most recent form submission on the screen. 
function displayRecentInputs() {
	document.getElementById("recentInputs").textContent = localStorage.getItem("recentInputs");
}

function submitHandler(e) {
	
	// Disable the submit button. 
	const submitBtn = document.getElementById("submitBtn");
	submitBtn.disabled = true;
	
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
		submitBtn.disabled = false;
		return;
	} else {
		const inputJSON = JSON.stringify(inputs);
		console.log(inputJSON);
		localStorage.setItem("recentInputs", inputJSON);
		displayRecentInputs();
		validation.textContent = "Submission successful.";
	}
	
	// Re-enable the submit button. 
	submitBtn.disabled = false;
}