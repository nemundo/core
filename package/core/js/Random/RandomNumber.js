export default class RandomNumber {

    minValue = 0;

    maxValue = 100;


    getNumber() {


        //let min = Math.ceil(min);
        //max = Math.floor(max);
        return Math.floor(Math.random() * (this.maxValue - this.minValue + 1)) + this.minValue;

        //return Math.floor(Math.random() * this.maxValue);


    }


}