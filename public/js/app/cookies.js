class Cookies {
    constructor(banner, button) {
        this.banner      = banner;
        this.button      = button;
        this.cookieName  = 'cookieConsent';
        this.cookieValue = 'dismissed';
    }
    
    load() {
        this.ifPresent();
        this.isDismissed();
    }

    dismiss() {
        const date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        document.cookie = `${this.cookieName}=${this.cookieValue};expires=${date.toUTCString()};path=/`;
        this.banner.remove();
    }

    ifPresent() {
        if (this.button) {
            this.button.addEventListener('click', this.dismiss.bind(this));
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

