// GeoCoordinate
// GeoCoordinateType

export default class GeoCoordinateItem {

    latitude = 0;  // null;

    longitude = 0;  // null;

    altitude = null;


    getText() {

        let text = this.latitude + "," + this.longitude;
        return text;

    }


    fromText(text) {

        let textList = text.split(",");

        this.latitude = textList[0];
        this.longitude = textList[1];

        return this;

    }

}