<?php

namespace Nemundo\Core\Time;


use Nemundo\Core\Base\AbstractBase;

// Second
class SecondConverter extends AbstractBase
{

    /**
     * @var
     */
    private $second;

    public function __construct($second)
    {
        $this->second = $second;
    }


    public function getHourMinute()
    {

        $hours = floor($this->second / 3600);
        $minutes = floor(($this->second / 60) % 60);
        //$seconds = $seconds % 60;

        $value = $hours . ':' . $minutes;

        //return "$hours:$minutes:$seconds";

        return $value;


    }


}