const MAX_RAND = 500;
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
	var number1 = new BigNumber(""+number1);
	var power = new BigNumber(""+power);
	var number2 = new BigNumber(""+number2);
	PI = new BigNumber(number1.pow(power)).mod(number2);
	return PI;
}


function deffiehelman() {
	var xhttp = new XMLHttpRequest();

	number1 = generateNumber();
	number2 = generateNumber();
	// alert("number 1, number 2 = "+number1+" "+number2);
	xhttp.open("GET", "deffiehelman.php?action=1&number1="+number1+"&number2="+number2+"&login="+0, false);
	xhttp.send();


	sharedPublicServer = xhttp.responseText;

	//alert("client sharedPublicServer = "+sharedPublicServer);	

	randomPrivate = generateNumber();

	var sharedPublicClient = new BigNumber(computePublic(number1,randomPrivate,number2));

	//alert("sharedPublicClient = "+sharedPublicClient);
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "deffiehelman.php?action=2&sharedPublicClient="+sharedPublicClient+"&login="+0, false);
	xhttp.send();

	sharedKey = sharedPrivate(sharedPublicServer,randomPrivate,number2);
	// alert("sharedKey = "+sharedKey);	
	// alert(xhttp.responseText);
	return sharedKey;
}


function deffiehelmanForLogin(email) {
	var xhttp = new XMLHttpRequest();

	number1 = generateNumber();
	number2 = generateNumber();
	// alert("number 1, number 2 = "+number1+" "+number2);
	xhttp.open("GET", "deffiehelman.php?action=1&number1="+number1+"&number2="+number2+"&login="+1+"&email="+email, false);
	xhttp.send();


	sharedPublicServer = xhttp.responseText;

	//alert("client sharedPublicServer = "+sharedPublicServer);	

	randomPrivate = generateNumber();

	var sharedPublicClient = new BigNumber(computePublic(number1,randomPrivate,number2));

	//alert("sharedPublicClient = "+sharedPublicClient);
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "deffiehelman.php?action=2&sharedPublicClient="+sharedPublicClient+"&login="+1+"&email="+email, false);
	xhttp.send();

	sharedKey = sharedPrivate(sharedPublicServer,randomPrivate,number2);
	// alert("sharedKey = "+sharedKey);	
	// alert(xhttp.responseText);
	return sharedKey;
}


/*
 * Returns the result of having each alphabetic letter of the given text string shifted forward
 * by the given amount, with wraparound. Case is preserved, and non-letters are unchanged.
 * Examples:
 *   caesarShift("abz",  0) = "abz"
 *   caesarShift("abz",  1) = "bca"
 *   caesarShift("abz", 25) = "zay"
 *   caesarShift("THe 123 !@#$", 13) = "GUr 123 !@#$"
 */
function caesarShift(text, shift) {
	var result = "";
	for (var i = 0; i < text.length; i++) {
		var c = text.charCodeAt(i);
		if      (c >= 65 && c <=  90) result += String.fromCharCode((c - 65 + shift) % 26 + 65);  // Uppercase
		else if (c >= 97 && c <= 122) result += String.fromCharCode((c - 97 + shift) % 26 + 97);  // Lowercase
		else                          result += text.charAt(i);  // Copy
	}
	return result;
}

