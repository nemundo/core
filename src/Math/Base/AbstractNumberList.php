<?php

namespace Nemundo\Core\Math\Base;


use Nemundo\Core\Base\AbstractBase;


abstract class AbstractNumberList extends AbstractBase
{

    /**
     * @var int[]
     */
    protected $list = [];


    protected function addValue($value)
    {

        $this->list[] = $value;
        return $this;

    }


    public function getSum()
    {
        $sum = array_sum($this->list);
        return $sum;
    }


    public function getAverage($roundNumber = null)
    {

        $average = array_sum($this->list) / count($this->list);

        if ($roundNumber !== null) {
            $average = round($average, $roundNumber);
        }

        return $average;

    }


    public function getStandardDeviation($roundNumber = null)
    {

        $sum = array_sum($this->list);
        $count = count($this->list);
        $mean = $sum / $count;
        $result = 0;
        foreach ($this->list as $value)
            $result += pow($value - $mean, 2);
        unset($value);
        $count = ($count == 1) ? $count : $count - 1;
        $deviation = sqrt($result / $count);

        if ($roundNumber !== null) {
            $deviation = round($deviation, $roundNumber);
        }

        return $deviation;

        //return stats_standard_deviation($this->list);


        // http://www.monkey-business.biz/2985/php-funktion-standardabweichung-stabw/

    }


    public function getMedian($roundNumber = null)
    {

        $median = 'No Value';

        if ($this->getCount() > 0) {

            $tmpList = $this->list;
            sort($tmpList);

            $count = count($tmpList); //total numbers in array
            $middleval = floor(($count - 1) / 2); // find the middle value, or the lowest middle value
            if ($count % 2) { // odd number, middle is the median
                $median = $tmpList[$middleval];
            } else { // even number, calculate avg of 2 medians
                $low = $tmpList[$middleval];
                $high = $tmpList[$middleval + 1];
                $median = (($low + $high) / 2);
            }
        }

        if ($roundNumber !== null) {
            $median = round($median, $roundNumber);
        }

        return $median;

    }


    public function getMaxValue()
    {
        return max($this->list);
    }


    public function getMinValue()
    {
        return min($this->list);
    }


}