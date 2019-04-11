<?php

namespace Nemundo\Core\Date;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\DateTime\DateTime;


class DateTimeDifference extends AbstractBaseClass
{

    /**
     * @var DateTime
     */
    public $dateFrom;

    /**
     * @var DateTime
     */
    public $dateUntil;

    // dateTill


    public function getDifferenceInMinute()
    {

        $difference = $this->getDifference();

        $differenceInMinute = 0;

        if ($difference !== 0) {
            $differenceInMinute = ($difference->d * 1440) + ($difference->h * 60) + $difference->i;
        }

        //if ($difference->invert = 1) {
        $differenceInMinute = abs($differenceInMinute);
        //}

        return $differenceInMinute;

    }


    public function getDifferenceInSecond()
    {

        $difference = $this->getDifference();
        $differenceInSecond = ($difference->d * 86400) + ($difference->h * 3600) + ($difference->i * 60) + $difference->s;

        if ($difference->invert == 1) {
            $differenceInSecond = -1 * $differenceInSecond;
        }

        return $differenceInSecond;

    }


    public function getDifferenceInDay()
    {

        $day = date_diff(new \DateTime($this->dateFrom->getIsoDateFormat()), new \DateTime($this->dateUntil->getIsoDateFormat()));
        return $day->days;

    }


    private function getDifference()
    {

        $difference = 0;

        if (($this->dateFrom !== null) && ($this->dateUntil !== null)) {
            $difference = date_diff(date_create($this->dateFrom->getIsoDateTimeFormat()), date_create($this->dateUntil->getIsoDateTimeFormat()));
        }

        return $difference;

    }


}