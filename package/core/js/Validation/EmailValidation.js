export default class EmailValidation {

    isValid(email) {

        email = email.trim();

        let valid = false;
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (email.match(validRegex)) {
            valid = true;
        }

        return valid;

    }

}