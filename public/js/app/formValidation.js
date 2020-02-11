class Validate
{
	constructor(fieldDiv, formField, errorContainer, errorMessage, errorMessageContent, errorMessageInnerHTML) {
		this.fieldDiv = fieldDiv;
		this.formField = formField;
		this.errorMessage = errorMessage;
		this.errorMessageContent = "";
		this.errorMessageInnerHTML = "";
	}

	valid() {
		this.fieldDiv.style.color = "#5e6e66";
		this.formField.style.border = "1px solid #5e6e66";
		this.errorMessage.innerHTML = this.errorMessageInnerHTML;
		return true;
	}

	notEmpty() {
		if (this.formField.value != "") {
			valid();
		}
	}

	identical() {
		if (this.formField.value === this.formField.value) {
			valid();
		}
	}

	invalid() {
		this.fieldDiv.style.color = "red";
		this.formField.style.border = "1px solid red";
		this.errorMessage.textContent = this.errorMessageContent;
		this.formField.focus();
		return false;
	}

	empty() {
		if (this.formField.value == "") {
			invalid();
		}
	}

	tooSmall() {
		if (this.formField.value.length < 3) {
			invalid();
		}
	}

	different() {
		if (this.formField.value != this.formField.value) {
			invalid();
		}
	}
}