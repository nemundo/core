export default class NumberValidation {

    isValid(number) {

        number = number.trim();

        let valid = false;
        if (Number.isInteger(number)) {
            valid = true;
        }

        return valid;

    }

}

