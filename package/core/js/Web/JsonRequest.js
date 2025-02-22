import Debug from "../Debug/Debug.js";

export default class JsonRequest {

    onLoaded = null;

    onFinished = null;

    onDataRow = null;

    onError = null;

    _url = null;

    _data;

    _count = null;

    constructor(url) {

        this._url = url;
        this._data = new FormData();

    }

    addParameter(name, value) {
        this._data.set(name, value);
        return this;
    }

    clearParameter() {
        this._data = new FormData();
        return this;
    }


    addFile(name, file) {

        this._data.set(name, file);
        return this;

    }


    load() {

        let local = this;

        fetch(this._url, {
            method: 'POST',
            body: local._data
        }).then(response => response.json())
            .then(function (data) {

                local._count = data.length;

                if (local.onLoaded !== null) {
                    local.onLoaded(data);
                }

                if (local.onDataRow !== null) {
                    for (let row of data) {
                        local.onDataRow(row);
                    }
                }

                if (local.onFinished !== null) {
                    local.onFinished();
                }
            })
            .catch(error => {
                (new Debug).write("Json Request Error: " + error);

                if (local.onError !== null) {
                    local.onError(error);
                }

            });

    }


    getCount() {
        return this._count;
    }


}
