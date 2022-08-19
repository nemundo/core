import Debug from "../Debug/Debug.js";


// CookieManager
export default class CookieReader {

    _cookieList = [];

    constructor() {


        let cookieList = document.cookie.split('; ');

        for (let value of cookieList) {

            let valueList = value.split('=');
            this._cookieList[valueList[0]] = valueList[1];

        }

    }


    getList() {

        return this._cookieList;

    }


    existsValue(name) {

        let value = false;

        if (name in this._cookieList) {
            value = true;
        }

        return value;

    }


    getValue(name) {

        let value = null;

        if (name in this._cookieList) {

            value = this._cookieList[name];

        } else {

            (new Debug()).write("Cookie not found. Name " + name);

        }

        return value;

    }


    setValue(name, value) {

        let exdays = 30;

        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires;  // + ";path=/";

        //(new Debug()).write(document.cookie);

        return this;

    }


    deleteValue(name) {

    }


    deleteAllCookies() {

        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }

    }


}
