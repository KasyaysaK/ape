
const cookies = new Cookies(document.querySelector('.cookie-banner'), document.querySelector('.cookie-dismiss'));

cookies.load();

const titleValidation = new Validation(document.getElementById('title'), document.getElementById('title-notice'));
titleValidation.empty();
const descriptionValidation = new Validation(document.getElementById('description'), document.getElementById('description-notice'));
descriptionValidation.empty();
console.log
const tagValidation = new Validation(document.getElementById('tag'), document.getElementById('tag-notice'));
tagValidation.empty();

