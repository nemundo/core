export default class BrowserInformation {

    getLanguage() {
        return window.navigator.language;
    }

    getUserAgent() {
        return window.navigator.userAgent;
    }

    getHeight() {
        return window.screen.height;
    }

    getWidth() {
        return window.screen.width;
    }

}