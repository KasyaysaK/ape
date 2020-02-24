class Border {
	constructor(button, element) {
		this.button = button; 
		this.element = element;
	}

	addBorder() {
		this.button.addEventlistener('click', () => {
			this.element.style.border = '1px dotted black';
		})
	}

}