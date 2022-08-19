export default class WebRequest {

    onData = null;

    _url = null;
    _data = [];


    constructor(url) {
        this._url = url;
    }

    addParameter(name, value) {
        this._data[name] = value;
    }


    load() {


        const ret = [];
        for (let n in this._data) {
            ret.push(encodeURIComponent(n) + '=' + encodeURIComponent(this._data[n]));
        }
        let url = this._url;

        if (ret.length > 0) {
            url = url + "?" + ret.join('&');
        }


        let _copy = this;

        fetch(url)
            .then(response => response.text())
            .then(function (data) {

                if (_copy.onData !== null) {
                    _copy.onData(data);
                }

            });

    }

}
