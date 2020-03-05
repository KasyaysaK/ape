function printError(elementId, errorMessage) {
	document.getElementById(elementId).innerHTML = errorMessage;
}

//validate the signup form
function validateSignupForm() {

	let name 	 = document.getElementById('signupName').value;
	let email 	 = document.getElementById('signupEmail').value;
	let password = document.getElementById('signupPassword').value;
	let confirm  = document.getElementById('signupConfirm').value;

	let nameError = emailError = passwordError = confirmError = true; 

	//name validation
	if(name = "") {
		printError("nameError", "Veuillez entrer un pseudo"); 
		style.borderColor = "red"; 
	} else {
		let regex = /^[a-zA-Z\s]+$/;
		if(regex.test(name) === false) {
			printError("nameError", "Veuillez entrer un pseudo valide")
		} else {
			printError("nameError", "")
			nameError = false;
		}	
	}

	//email validation
	if(email = "") {
		printError("emailError", "Veuillez entrer votre email"); 
	} else {
		let regex = /^\S+@\S+\.\S+$/;
		if(regex.test(email) === false) {
			printError("emailError", "Veuillez entrer une adresse email valide")
		} else {
			printError("emailError", "")
			emailError = false;
		}	
	}

	//password validation
	if(password = "") {
		printError("passwordError", "Veuillez entrer un mot de passe"); 
	} else {
		let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
		if(regex.test(password) === false) {
			printError("passwordError", "Le mot de passe doit contenir au moins 6 caractères avec au moins une lettre et un chiffre.")
		} else {
			printError("passwordError", "")
			passwordError = false;
		}	
	}

	//confirm validation
	if(confirm = "") {
		printError("confirmError", "Veuillez confirmer votre mot de passe"); 
	} else {
		if(confirm != password) {
			printError("confirmError", "La confirmation du mot de passe ne correspond pas")
		} else {
			printError("confirmError", "")
			confirmError = false;
		}
	}

	//prevent submission if there are any errors
	if((nameError || emailError || passwordError || confirmError) == true) {
		return false;
	}

}

//validate the signin form
function validateSigninForm() {
	console.log("coucou");

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

	//prevent submission if there are any errors
	if((signinNameError || signinPasswordError) == true) {
		return false;
	}

}

//validate add post 
function validateAddPost() {
	console.log("coucou");
	let addTitle	   = document.getElementById('addTitle').value;
	let addDescription = document.getElementById('addDescription').value;
	let addContent     = document.getElementById('addContent').value;
	let addTag 		   = document.getElementsByName('addTag');

	let addTitleError = addDescriptionError = addContentError = addTagError = true;

	//addTitle validation
	if(addTitle == "") {
		printError("addTitleError", "Veuillez écrire un titre");
	} else {
		printError("addTitleError", "")
		addTitleError = false;
	}

	//addDescription validation
	if(addDescription == "") {
		printError("addDescriptionError", "Veuillez écrire une description");
	} else {
		printError("addDescriptionError", "")
		addDescriptionError = false;
	}

	//addTitle validation
	if(addContent == "") {
		printError("addContentError", "Veuillez écrire un titre");
	} else {
		printError("addContentError", "")
		addContentError = false;
	}

	//addTag validation
	if(!addTag.checked) {
		printError("addTagError", "Veuillez sélectionner une rubrique")
	}

	//prevent submission if there are any errors
	if((addTitleError || addDescriptionError || addContentError) == true) {
		return false;
	}
}


