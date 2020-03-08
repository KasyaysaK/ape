
const cookies = new Cookies(document.querySelector('.cookie-banner'), document.querySelector('.cookie-dismiss'));
cookies.load();
console.log(cookies);


const back    = new Back(document.querySelector('.back-button'));
back.goBack();

const name	  = new Validation('signupName', 'nameError');
console.log(name);
name.empty();
