function printError(elementId, errorMessage) {
	document.getElementById(elementId).innerHTML = errorMessage;
}

function validateSigninForm() {

	let signinName 	    = document.getElementById('signinName').value;
	let signinPassword  = document.getElementById('signinPassword').value;

	let signinNameError = signinPasswordError = true; 

	//signinName validation
	if(signinName == "") {
		printError("signinNameError", "Veuillez entrer un pseudo"); 
	} else {
		printError("signinNameError", "")
		signinNameError = false;
	}	

	//signinPassword validation
	if(signinPassword = "") {
		printError("signinPasswordError", "Veuillez entrer un mot de passe"); 
	} else {
		printError("signinPasswordError", "")
		signinPasswordError = false;
	}	

	//prevent form submission if there is an error
	if((signinNameError |signinPasswordError) == true) {
		return false;
	}

}
