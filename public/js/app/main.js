
const cookies 				= new Cookies(document.querySelector('.cookie-banner'), document.querySelector('.cookie-dismiss'));
cookies.load();

const titleValidation	 	= new Validation(document.getElementById('title'), document.getElementById('title-notice'));
titleValidation.empty();
const descriptionValidation = new Validation(document.getElementById('description'), document.getElementById('description-notice'));
descriptionValidation.empty();
const tagValidation 		= new Validation(document.getElementById('tag'), document.getElementById('tag-notice'));
tagValidation.empty();

const nameValidation 		= new Validation(document.getElementById('name'), document.getElementById('name-notice'));
nameValidation.empty();
console.log(nameValidation);
const emailValidation	 	= new Validation(document.getElementById('email'), document.getElementById('email-notice'));
emailValidation.empty();
