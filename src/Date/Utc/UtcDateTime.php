<?php

namespace Nemundo\Core\Date\Utc;


use Nemundo\Core\Date\Timezone\Timezone;
use Nemundo\Core\Type\DateTime\DateTime;

class UtcDateTime extends DateTime
{


    public function __construct($date = null)
    {

        $this->timezone = Timezone::UTC;
        parent::__construct($date);
        //$this->date->setTimezone((new \DateTimeZone(Timezone::UTC)));

    }


    public function getLocalDateTime($timezone)
    {

        //$dateTime = clone($this->date);
        //$dateTime->setTimeZone(new \DateTimeZone($timezone));

        $dateTime = new DateTime($this->getIsoDateFormat());
        $dateTime->setTimezone($timezone);

        return $dateTime;

    }

}