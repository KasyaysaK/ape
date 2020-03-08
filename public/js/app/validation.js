class Validation {
	constructor(field, elementId){
		this.field 	  	  = document.getElementById(field);
		this.elementId 	  = elementId;
		this.errorMessage = errorMessage;
	}

	printError(errorMessage) {
		document.getElementById(this.elementId).innerHTML = this.errorMessage;
	}

	name() {
		this.elementId = true;
		
		if(this.field == "") {
			this.printError(this.errorMessage, "Veuillez entrer un pseudo")
		} else {
			let regex = /^[a-zA-Z\s]+$/;
			if(regex.test(name) === false) {
				this.printError(this.elementId, "Veuillez entrer un pseudo valide")
			} else {
				this.printError(this.elementId, "")
				this.elementId = false;
			}	
		}
	}
}
