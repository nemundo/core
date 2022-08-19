export default class ConnectionEvent {


    set onOnline(value) {

        window.addEventListener("online", function () {
                //if (navigator.onLine) {
                    value();
                //}
            }
        );


    }

    set onOffline(value) {

        window.addEventListener("offline", function () {
                //if (navigator.onLine) {
                    value();
                //}
            }
        );


    }


    /*
    window.addEventListener('offline', handleConnection);

    function handleConnection() {
        if (navigator.onLine) {

            title.text = "online";

            /*isReachable(getServerUrl()).then(function(online) {
                if (online) {
                    // handle online status
                    //console.log('online');
                    title.text = "online";
                } else {
                    title.text = "no connectivity";
                }
            });*/
    /*    } else {
            // handle offline status
            //console.log('offline');
            title.text = "offline";
        }
    }*/


}