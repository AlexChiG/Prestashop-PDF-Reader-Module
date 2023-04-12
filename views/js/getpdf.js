var form = document.querySelector('form');
// alert('yess');
form.addEventListener('submit', function(event) {
	// Prevent the default form submission behavior
    alert('yess');
	event.preventDefault();

	// Get the value of the name field
	var name = document.getElementById('pdfurl').value;

	// Do something with the name value
    alert('yes3');
	console.log('Hello, ' + name + '!');
});
var myInputValue = "big yes";
var myInputValue = document.getElementById("pdfurl").value;

function returnValue() {
    alert(myInputValue);
    return myInputValue;
}
