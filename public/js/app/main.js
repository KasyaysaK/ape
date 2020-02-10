const signup = new Login(document.getElementById('signup-button'), 
						document.getElementById('signup-form'), 
						document.getElementById('signin-form'))	; 
signup.displayForm(); 

const signin = new Login(document.getElementById('signin-button'),
						document.getElementById('signin-form'), 
						document.getElementById('signup-form'));
signin.displayForm();

