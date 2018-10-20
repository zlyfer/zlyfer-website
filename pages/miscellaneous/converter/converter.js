function from10() {

	// Valid Input
	var decimal = document.getElementById('dec');
	var invalid = /[^0-9]/gi;
	if (invalid.test(decimal.value)) {
		decimal.value = decimal.value.replace(invalid, "");
	}
	if (Number(decimal.value) > 16777215) {
		decimal.value = 16777215;
	}
	
	// Convert
	if (decimal.value != "") {
		// To Binary
		document.getElementById('bin').value = parseInt(decimal.value, 10).toString(2);
		// To Hexadecimal
		document.getElementById('hex').value = parseInt(decimal.value, 10).toString(16);
		// To Octal
		document.getElementById('oct').value = parseInt(decimal.value, 10).toString(8);
	} else {
		// To Binary
		document.getElementById('bin').value = "";
		// To Hexadecimal
		document.getElementById('hex').value = "";
		// To Octal
		document.getElementById('oct').value = "";
	}
}

function from2() {
	
	// Valid Input
	var binary = document.getElementById('bin');
	var invalid = /[^0-1]/gi;
	if (invalid.test(binary.value)) {
		binary.value = binary.value.replace(invalid, "");
	}
	
	// Convert
	if (binary.value != "") {
		// To Decimal
		document.getElementById('dec').value = parseInt(binary.value, 2);
		// To Hexadecimal
		document.getElementById('hex').value = parseInt(binary.value, 2).toString(16);
		// To Octal
		document.getElementById('oct').value = parseInt(binary.value, 2).toString(8);
	} else {
		// To Decimal
		document.getElementById('dec').value = "";
		// To Hexadecimal
		document.getElementById('hex').value = "";
		// To Octal
		document.getElementById('oct').value = "";
	}
}

function from16() {
	// Valid Input
	var hexadecimal = document.getElementById('hex');
	var invalid = /[^A-F0-9]/gi;
	if (invalid.test(hexadecimal.value)) {
		hexadecimal.value = hexadecimal.value.replace(invalid, "");
	}
	
	// Convert
	if (hexadecimal.value != "") {
		// To Decimal
		document.getElementById('dec').value = parseInt(hexadecimal.value, 16);
		// To Binary
		document.getElementById('bin').value = parseInt(hexadecimal.value, 16).toString(2);
		// To Octal
		document.getElementById('oct').value = parseInt(hexadecimal.value, 16).toString(8);
	} else {
		// To Decimal
		document.getElementById('dec').value = "";
		// To Binary
		document.getElementById('bin').value = "";
		// To Octal
		document.getElementById('oct').value = "";
	}
}

function from8() {
	// Valid Input
	var octal = document.getElementById('oct');
	var invalid = /[^0-7]/gi;
	if (invalid.test(octal.value)) {
		octal.value = octal.value.replace(invalid, "");
	}
	
	// Convert
	if (octal.value != "") {
		// To Decimal
		document.getElementById('dec').value = parseInt(octal.value, 8);
		// To Binary
		document.getElementById('bin').value = parseInt(octal.value, 8).toString(2);
		// To Hexadecimal
		document.getElementById('hex').value = parseInt(octal.value, 8).toString(16);
	} else {
		// To Decimal
		document.getElementById('dec').value = "";
		// To Binary
		document.getElementById('bin').value = "";
		// To Hexadecimal
		document.getElementById('hex').value = "";
	}
}