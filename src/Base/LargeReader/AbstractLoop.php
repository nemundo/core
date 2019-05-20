<?php

namespace Nemundo\Core\Base\LargeReader;


abstract class AbstractLoop extends AbstractLargeReader
{

    /**
     * @var int
     */
    public $minNumber = 0;

    /**
     * @var int
     */
    public $maxNumber = 100;


    abstract protected function onData($number);


    public function startData()
    {


        for ($n = $this->minNumber; $n <= $this->maxNumber; $n = $n + $this->incrementalValue) {
            $this->onData($n);

        }

    }

}