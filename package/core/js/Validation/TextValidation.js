export default class TextValidation {

    isValid(text) {

        text = text.trim();

        let valid = false;
        if (text !== "") {
            valid = true;
        }

        return valid;

    }

}