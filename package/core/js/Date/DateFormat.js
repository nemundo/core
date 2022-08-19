export default class DateFormat {

    _isoDate=null;

    constructor(isoDate) {
        this._isoDate=isoDate;
    }


    getGermanDate() {

        let date = new Date(this._isoDate);    //.getDate("m.yyyy");  // toLocaleString();
        let dateText = date.toLocaleDateString();

        return dateText;

    }


    getGermanDateTime() {

        let date = new Date(this._isoDate);    //.getDate("m.yyyy");  // toLocaleString();
        let dateText = date.toLocaleString();

        return dateText;

    }



}




//toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' })