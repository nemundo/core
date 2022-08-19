export default class UrlBuilder {

    _url = null;
    _data = [];

    constructor(url) {
        this._url = url;
    }

    addParameter(name, value) {
        this._data[name] = value;
    }

    getUrl() {

        const ret = [];
        for (let n in this._data) {
            ret.push(encodeURIComponent(n) + '=' + encodeURIComponent(this._data[n]));
        }
        let url = this._url;

        if (ret.length > 0) {
            url = url + "?" + ret.join('&');
        }

        return url;

    }

}

