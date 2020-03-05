class Back {
	constructor(button) {
		this.button = button;
	}
	goBack() {
		this.button.addEventListener('click', () => {
			history.back();
		})
	}
}
