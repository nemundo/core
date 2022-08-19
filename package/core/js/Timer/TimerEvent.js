import Debug from "../Debug/Debug.js";


// TimerEvent
export default class TimerEvent {

    intervall = 1000;
    _timer = null;
    _event = null;

    set onTime(value) {
        this._event = value;
    }

    start() {

        if (this._event == null) {
            (new Debug()).writeError("No onTime Event");
        }

        this._timer = setInterval(this._event, this.intervall);
    }


    stop() {
        clearTimeout(this._timer);
    }

}
