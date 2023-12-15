document.addEventListener("DOMContentLoaded", () => {
	// When submit button is clicked, get inputs and then validate them
	document.getElementById("checkoutBtn").addEventListener("click", submitHandler);  
});

// Grabs the values from the form fields. No validation is done at this point. 
function getFormInputs() {
	// Create an object and add each value from the form to it
	const inputs = {};
	inputs.address = document.getElementById("address").value.trim();
	inputs.city = document.getElementById("city").value.trim();
	inputs.state = document.getElementById("state").value.trim();
	inputs.zip = document.getElementById("zip").value.trim();
	inputs.creditCard = document.getElementById("number").value.trim();
	inputs.cvv = document.getElementById("cvv").value.trim();
	inputs.expiration = document.getElementById("expiration").value.trim();
	
	return inputs;
}

function submitHandler(e) {
	
	// Disable the submit button. 
	const checkoutBtn = document.getElementById("checkoutBtn");
	checkoutBtn.disabled = true;
	error = false;
	
	// Get each validation div and clear it to start from scratch with each submission.
	const addressValidation = document.getElementById("addressValidationDiv");
	addressValidation.textContent = "";
	const cityValidation = document.getElementById("cityValidationDiv");
	cityValidation.textContent = "";
	const stateValidation = document.getElementById("stateValidationDiv");
	stateValidation.textContent = "";
	const zipValidation = document.getElementById("zipValidationDiv");
	zipValidation.textContent = "";
	const numberValidation = document.getElementById("numberValidationDiv");
	numberValidation.textContent = "";
	const cvvValidation = document.getElementById("cvvValidationDiv");
	cvvValidation.textContent = "";
	const expirationValidation = document.getElementById("expirationValidationDiv");
	expirationValidation.textContent = "";
	
	// Get the inputs. 
	const inputs = getFormInputs();
	
	// Test each checkout input for various errors. Display the errors in
	// the corresponding validation div if one is found. 
	if (inputs.address === "") {
		addressValidation.textContent = "You must enter an address.";
		error = true;
	}
	
	if (inputs.city === "") {
		cityValidation.textContent = "You must enter a city.";
		error = true;
	} 
	
	if (inputs.state === "") {
		stateValidation.textContent = "You must enter a state.";
		error = true;
	} else if (inputs.state.search(/[^A-z]/) !== -1) {
		stateValidation.textContent = "State can only contain letters.";
		error = true;
	} else if (inputs.state.length !== 2) {
		stateValidation.textContent = "State must be 2 characters long.";
		error = true;
	} 
	
	if (inputs.zip === "") {
		zipValidation.textContent = "You must provide a zip code.";
		error = true;
	} else if (inputs.zip.search(/[^0-9]/) !== -1) {
		zipValidation.textContent = "Zip code must be a number.";
		error = true;
	} else if (inputs.zip.length !== 5) {
		zipValidation.textContent = "Zip code must be 5 characters long.";
		error = true;
	}
	
	if (inputs.creditCard === "") {
		numberValidation.textContent = "You must provide a credit card.";
		error = true;
	} else if (inputs.creditCard.search(/[^0-9]/) !== -1) {
		numberValidation.textContent = "Credit card must be a number.";
		error = true;
	} else if (inputs.creditCard.length !== 16) {
		numberValidation.textContent = "Credit card number must be 16 digits long.";
		error = true;
	}
	
	if (inputs.cvv === "") {
		cvvValidation.textContent = "You must provide a CVV number.";
		error = true;
	} else if (inputs.cvv.search(/[^0-9]/) !== -1) {
		cvvValidation.textContent = "CVV must be a number.";
		error = true;
	} else if (inputs.cvv.length !== 3) {
		cvvValidation.textContent = "CVV number must be 3 digits long.";
		error = true;
	}
	
	if (inputs.expiration === "") {
		expirationValidation.textContent = "You must provide an expiration date.";
		error = true;
	} else if (inputs.expiration.match(/^([0-9]{2})(\/)([0-9]{2})$/g) === null) {
		expirationValidation.textContent = "The expiration date must match the form of XX/XX.";
		error = true;
	} else if (inputs.expiration.match(/^([0-9]{2})(\/)([0-9]{2})$/g)[0] !== inputs.expiration) {
		expirationValidation.textContent = "The expiration date must match the form of XX/XX.";
		error = true;
	}
	
	// If there was an error, do nothing. Otherwise submit the checkout. 
	if (error) {
		checkoutBtn.disabled = false;
		return;
	} else {
		checkoutBtn.disabled = false;
		document.getElementById("checkoutForm").submit();
	}
}