import Debug from "../Debug/Debug.js";


export default class GeoLocation2 {


    onLocation;


    getLocation() {




        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(this.onLocation(position));

            /*navigator.geolocation.getCurrentPosition(function(pos) {
                (new Debug()).write("position:"+pos.coords.latitude);
            } );*/


        } else {

            (new Debug()).write("Geolocation is not supported by this browser.");

        }



    }


    //navigator.geolocation.watchPosition(success, error, options);







}




/*
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
}
*/
