class Login {
	constructor(buttonId, formToShow, formToHide) {
		this.button = buttonId;
		this.formToShow = formToShow;
		this.formToHide = formToHide;
	}

	displayForm() {
		this.button.addEventListener('click', () => {
			this.formToShow.style.display = 'block'; 
			this.formToHide.style.display = 'none';
		})
	}
}