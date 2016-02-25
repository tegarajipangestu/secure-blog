const MAX_RAND = 2000;
const MIN_RAND = 0;


function generateNumber() {
	
	return Math.floor(Math.random() * (MAX_RAND - MIN_RAND)) + MIN_RAND;
}

function computePublic(number1, power, number2) {
	var number1 = new BigNumber(""+number1);
	var power = new BigNumber(""+power);
	var number2 = new BigNumber(""+number2);
	PI = new BigNumber(number1.pow(power)).mod(number2);
	return PI;
}

function sharedPrivate(number1, power, number2) {

	return Math.pow(number1,power) % number2;	
}


function deffiehelman() {
	var xhttp = new XMLHttpRequest();

	number1 = generateNumber();
	number2 = generateNumber();
	// alert("number 1, number 2 = "+number1+" "+number2);
	xhttp.open("GET", "deffiehelman.php?action=1&number1="+number1+"&number2="+number2, false);
	xhttp.send();
	

	sharedPublicServer = xhttp.responseText;

	alert("client sharedPublicServer = "+sharedPublicServer);	

	randomPrivate = generateNumber();

	var sharedPublicClient = new BigNumber(computePublic(number1,randomPrivate,number2));

	alert("sharedPublicClient = "+sharedPublicClient);
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "deffiehelman.php?action=2&sharedPublicClient="+sharedPublicClient, false);
	xhttp.send();

	sharedKey = sharedPrivate(sharedPublicServer,randomPrivate,number2);
	alert("sharedKey = "+sharedKey);	
	// alert(xhttp.responseText);
	return sharedKey;
}
