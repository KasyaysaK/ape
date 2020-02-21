// Key under which name the cookie is saved
const cookieName = 'cookieConsent';
// The value could be used to store different levels of consent
const cookieValue = 'dismissed';

function dismiss() {
    const date = new Date();
    // Cookie is valid 1 year: now + (days x hours x minutes x seconds x milliseconds)
    date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
    // Set cookie
    document.cookie = `${cookieName}=${cookieValue};expires=${date.toUTCString()};path=/`;

    // You probably want to remove the banner
    document.querySelector('.cookie-banner').remove();
}

// Get button element
const buttonElement = document.querySelector('.cookie-dismiss');
// Maybe cookie consent is not present
if (buttonElement) {
    // Listen on button click
    buttonElement.addEventListener('click', dismiss);
}

function isDismissed() {
    // Get all cookies as string
    const decodedCookie = decodeURIComponent(document.cookie);
    // Separate cookies
    const cookies = decodedCookie.split(';');
    for (let cookie of cookies) {
        cookie = cookie.trim();
        // Check if cookie is present
        if (cookie === `${cookieName}=${cookieValue}`) {
            return true;
        }
    }

    return false;
}

/*class Cookies {
    constructor(banner, button) {
        this.banner      = banner;
        this.button      = button;
        this.cookieName  = 'cookieConsent';
        this.cookieValue = 'dismissed';
    }
    
    load() {
        this.dismiss();
        this.ifPresent();
        this.isDismissed();
    }

    dismiss() {
        const date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        this.banner.remove();
    }

    ifPresent() {
        if (this.button) {
            this.button.addEventListener('click', dismiss)
        }
    }

    isDismissed() {
    // Get all cookies as string
    const decodedCookie = decodeURIComponent(document.cookie);
    // Separate cookies
    const cookies = decodedCookie.split(';');
    for (let cookie of cookies) {
        cookie = cookie.trim();
        // Check if cookie is present
        if (cookie === `${this.cookieName}=${this.cookieValue}`) {
            return true;
        }
    }
    return false;
    }
}
*/ 
