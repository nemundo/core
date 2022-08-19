export default class ConnectionCheck {

    isOnline() {

        let value = false;
        if (navigator.onLine) {
            value = true;
        }

        return value;

    }


}