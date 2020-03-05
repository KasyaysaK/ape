class Validation
{
	constructor(field, noticeMessage) {
		this.field    	 	 = field;
		this.noticeMessage   = noticeMessage;

  		this.field.addEventListener("input", () => this.empty());
	}

	valid() {
		this.field.style.borderColor     = "green";
		this.noticeMessage.style.display = "none"; 
		return true;
	}

	invalid() {
		this.field.style.borderColor 	 = "red";
		this.field.focus();
		this.noticeMessage.style.display = "block";
		return false; 
	}

	empty() {
		if (this.field.value.length == "0") {
			this.invalid();
		}
		else {
			this.valid();
		}
	}

	different() {
		if (this.field.value != this.field.value) {
			invalid();
		}
	}

}