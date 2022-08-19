

export default class Delay {

    delay = 1000;
    _timer = null;

    set onDelay(value) {
        this._timer = setTimeout(value, this.delay);
    }

}
