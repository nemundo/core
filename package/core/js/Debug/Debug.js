export default class Debug {

    write(message) {
        console.log(message);
    }

    writeLog(message) {
        console.log(message);
    }

    writeError(message) {
        console.error(message);
    }

    writeWarning(message) {
        console.warn(message);
    }

    writeList(list) {
        console.table(list);
    }


}


