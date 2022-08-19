import Debug from "../Debug/Debug.js";
import GeoCoordinateItem from "./GeoCoordinateItem.js";

export default class GeoLocationEvent {

    onLocation = null;

    intervall = 1000;

    getCurrentPosition() {

        let local = this;

        let options = {
            enableHighAccuracy: false,
            timeout: 5000,
            maximumAge: 0
        };

        navigator.geolocation.getCurrentPosition(function (coords) {

                let locationItem = new GeoCoordinateItem();
                locationItem.latitude = coords.coords.latitude;
                locationItem.longitude = coords.coords.longitude;
                locationItem.altitude= coords.coords.altitude;

                if (local.onLocation !== null) {
                    local.onLocation(locationItem);
                }

            }


            , function (error) {
                (new Debug()).writeError(error.message);
            }, options);





       /* var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        };

        function success(pos) {
            var crd = pos.coords;

            console.log('Your current position is:');
            console.log(`Latitude : ${crd.latitude}`);
            console.log(`Longitude: ${crd.longitude}`);
            console.log(`More or less ${crd.accuracy} meters.`);
        }

        function error(err) {
            console.warn(`ERROR(${err.code}): ${err.message}`);
        }

        navigator.geolocation.getCurrentPosition(success, error, options);*/




    }






    startWatch() {

        let local = this;

        let options = {
            enableHighAccuracy: false,
            timeout: this.intervall,
            maximumAge: 0
        };

        navigator.geolocation.watchPosition(function (coords) {

                let locationItem = new GeoCoordinateItem();
                locationItem.latitude = coords.coords.latitude;
                locationItem.longitude = coords.coords.longitude;
                locationItem.altitude= coords.coords.altitude;

                if (local.onLocation !== null) {
                    local.onLocation(locationItem);
                }

            }


            , function (error) {
                (new Debug()).writeError(error.message);
            }, options);


        /*  }
          error(err)
          {
              console.warn('ERROR(' + err.code + '): ' + err.message);

          }*/

    }


}