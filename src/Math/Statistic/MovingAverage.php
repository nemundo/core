<?php


namespace Nemundo\Core\Math\Statistic;


use Nemundo\Core\Base\AbstractBase;

class MovingAverage extends AbstractBase
{

    public $movingNumber = 1;

    private $averageList = [];

    private $total = 0;

    private $count = 0;

    public function addNumber($number)
    {

        $this->total = $this->total + $number;
        $this->count++;

        if ($this->count == $this->movingNumber) {

            $this->averageList[] = $this->total / $this->count;

            $this->count = 0;
            $this->total = 0;

        }

        return $this;

    }


    public function getMovingAverageList()
    {

        return $this->averageList;

    }

}