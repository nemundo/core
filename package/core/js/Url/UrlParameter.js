export default class UrlParameter {


    _parameterName;

    constructor(parameterName) {
        this._parameterName = parameterName;
    }


    hasValue() {

        let params = new URLSearchParams(document.location.search.substring(1));
        return params.has(this._parameterName);

    }


    //getValue(parameterName) {

    getValue() {

        let value = null;

        /*let parameter = {};
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            parameter[key] = value;
        });

        let value = null;
        if (parameterName in parameter) {
            value = parameter[parameterName];
        }*/

        let params = new URLSearchParams(document.location.search.substring(1));
        value = params.get(this._parameterName);

        return value;

    }


}
