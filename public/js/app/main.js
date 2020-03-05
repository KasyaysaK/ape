
const cookies = new Cookies(document.querySelector('.cookie-banner'), document.querySelector('.cookie-dismiss'));
cookies.load();

const back    = new Back(document.querySelector('.back-button'));
back.goBack();
