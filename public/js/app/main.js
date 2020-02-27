
const cookies = new Cookies(document.querySelector('.cookie-banner'), document.querySelector('.cookie-dismiss'));

cookies.load();

const fieldset = new Border(document.getElementById('border'), document.getElementsByTagName('fieldset'));
console.log(fieldset);