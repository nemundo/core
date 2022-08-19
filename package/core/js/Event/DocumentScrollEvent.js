import Debug from "../../core/Debug/Debug.js";

export default class DocumentScrollEvent {

    //onEnd = null;

    /*
    constructor() {

        let local=this;

        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                // you're at the bottom of the page
                //(new Debug()).write("reload");
                local.onEnd();

            }
        };



    }*/

    static _eventList = [];


    set onScrollEnd(value) {

        let local=this;

        //this._autoReloadingEvent = function () {
        let scrollFunction = function () {
            if (window.innerHeight + window.pageYOffset >= document.body.offsetHeight) {
                //(new Debug()).write("load more");
                //local.loadMoreData();
                value();
            }
        };
        //};

        document.addEventListener('scroll', scrollFunction);

        DocumentScrollEvent._eventList.push(scrollFunction);

    }


    removeScrollEvent() {

        for (let event of DocumentScrollEvent._eventList) {
            document.removeEventListener("scroll", event);
        }

        DocumentScrollEvent._eventList=[];

    }


}