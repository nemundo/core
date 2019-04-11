<?php

namespace Nemundo\Core\Math;


use Nemundo\Core\Directory\AbstractDirectory;

class NumberDirectory extends AbstractDirectory
{

    public function getSum()
    {
        $sum = array_sum($this->list);
        return $sum;
    }


    public function getAverage()
    {

        $average = array_sum($this->list) / count($this->list);
        return $average;

    }


    public function getStandardAbweichung()
    {


        // http://www.monkey-business.biz/2985/php-funktion-standardabweichung-stabw/

    }


    public function getMedian()
    {

        $count = count($this->list); //total numbers in array
        $middleval = floor(($count - 1) / 2); // find the middle value, or the lowest middle value
        if ($count % 2) { // odd number, middle is the median
            $median = $this->list[$middleval];
        } else { // even number, calculate avg of 2 medians
            $low = $this->list[$middleval];
            $high = $this->list[$middleval + 1];
            $median = (($low + $high) / 2);
        }
        return $median;


    }


}