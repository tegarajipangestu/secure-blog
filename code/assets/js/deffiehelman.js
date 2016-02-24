const MAX_RAND = 2147483647;
const MIN_RAND = 0;


function generateNumber() {
	
	return Math.floor(Math.random() * (MAX_RAND - MIN_RAND)) + MIN_RAND;
}

function computePublic(number1 power number2) {

	return Math.pow(number1,power) % number2;
}

function sharedPrivate(number1 power number2) {

	return Math.pow(number1,power) % number2;	
}


function deffiehelman() {
	var xhttp = new XMLHttpRequest();

	number1 = generateNumber();
	number2 = generateNumber();
	xhttp.open("GET", "deffiehelman.php?action=1&number1="+number1+"&number2="+number2, false);
	xhttp.send();

	sharedPublicServer = xhttp.responseText;

	randomPrivate = generateNumber();
	sharedPublicClient = computePublic(number1,number2);

	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "deffiehelman.php?action=2&sharedPublicClient"+sharedPublicClient, false);
	xhttp.send();

	sharedKey = sharedPrivate(sharedPublicServer,randomPrivate,number2);

	return sharedKey;
}
