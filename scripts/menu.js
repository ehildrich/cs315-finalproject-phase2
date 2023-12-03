document.addEventListener("DOMContentLoaded", () => {
	// Setting the drop-down arrow to handle being clicked
	document.getElementById("dropDown").addEventListener("click", dropDownHandler );
});

// When clicked, the drop-down content will change visibility by swapping classes
// from close to open and vice versa
function dropDownHandler(e) {
	document.getElementById("dropDownContent").classList.toggle("close");
	document.getElementById("dropDownContent").classList.toggle("open");
}