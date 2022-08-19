import CursorStyle from "../../html/Style/Cursor.js";


// MouseController
// MouseCursor
export default class MouseCursor {

    setDefault() {

        
        this._getElement("*",CursorStyle.DEFAULT);
        this._getElement("input",CursorStyle.DEFAULT);
        this._getElement("button",CursorStyle.DEFAULT);
        
        /*document.querySelector("*").style.cursor = CursorStyle.DEFAULT;
        document.querySelector("input").style.cursor = CursorStyle.DEFAULT;
        document.querySelector("button").style.cursor = CursorStyle.DEFAULT;*/

    }


    setWait() {

        this._getElement("*",CursorStyle.WAIT);
        this._getElement("input",CursorStyle.WAIT);
        this._getElement("button",CursorStyle.WAIT);
        
        /*document.querySelector("*").style.cursor = CursorStyle.WAIT;
        document.querySelector("input").style.cursor = CursorStyle.WAIT;
        document.querySelector("button").style.cursor = CursorStyle.WAIT;*/

    }
    
    
    _getElement(element, cursor) {
        
        
        let selector =document.querySelector(element); 
        if (selector!==null) {
            selector.style.cursor =cursor;  // CursorStyle.DEFAULT;
        }
        
    }
    

}