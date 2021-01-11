<?php

namespace Nemundo\Core\Type\DateTime;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Date\Month\Month;
use Nemundo\Core\Date\Week\WeekYearNumber;
use Nemundo\Core\Date\Weekday\Weekday;
use Nemundo\Core\Log\LogFile;
use Nemundo\Core\Log\LogMessage;


class Date extends AbstractBaseClass
{

    /**
     * @var \DateTime
     */
    protected $date;


    protected $timezone;


    function __construct($date = null)
    {

        if ($date !== null) {
            try {

                /*
                                $timezone = null;
                                if ($this->timezone !== null) {
                                    $timezone = new \DateTimeZone($this->timezone);
                                }*/

                $this->date = new \DateTime($date, $this->getTimezone());
            } catch (\Exception $exception) {
                (new LogMessage())->writeError('Could not parse Date. Value: ' . $date);
            }
        }

    }



    // hasNoValue
    // isEmpty
    public function isNull()
    {

        $value = false;
        if ($this->date == null) {
            $value = true;
        }

        return $value;

    }

    // hasValue
    public function hasValue()
    {

        $value = true;
        if ($this->isNull()) {
            $value = false;
        }

        return $value;

    }


    public function getFormat($format)
    {
        $result = null;
        if ($this->date !== null) {
            $result = $this->date->format($format);
        }
        return $result;
    }


    // setToday
    public function setNow()
    {

        $this->date = new \DateTime('now', $this->getTimezone());

        // gibt Probleme bei Code Hinte Anzeigen in AbstractTreeContentType
        return $this;
    }


    public function channgeToLastDayOfMonth() {

        //$date = new DateTime('now');
        $this->date->modify('last day of this month');
        return $this;
        //echo $date->format('Y-m-d');


    }



    public function setValue($date)
    {
        $this->date = new \DateTime($date);
        return $this;
    }


    protected function setDefault()
    {
        if ($this->date == null) {
            $this->date = new \DateTime('2000-01-01 00:00:00');
        }
    }


    protected function getTimezone()
    {

        $timezone = null;
        if ($this->timezone !== null) {
            $timezone = new \DateTimeZone($this->timezone);
        }

        return $timezone;

    }


    protected function setDefaultNow()
    {
        if ($this->date == null) {
            $this->setNow();
        }
    }


    public function fromDateTime(DateTime $dateTime) {
        $this->fromIsoFormat($dateTime->getIsoDateTimeFormat());
        return $this;
    }

    public function fromTimestamp($timestamp)
    {
        $this->date = new \DateTime();
        $this->date->setTimestamp($timestamp);
        return $this;
    }

    public function fromIsoFormat($dateTime)
    {
        $this->date = new \DateTime($dateTime);
        return $this;
    }

    public function fromGermanFormat($dateTime)
    {
        $this->date = new \DateTime($dateTime);
        return $this;
    }

    public function setDay($day)
    {

        if (!is_numeric($day)) {
            (new LogFile())->writeError('Function setDay: No number. Value: ' . $day);
        }

        $this->setDefault();
        $this->date->setDate($this->getYear(), $this->getMonthNumber(), $day);
        return $this;
    }


    public function setMonth($month)
    {

        if (!is_numeric($month)) {
            (new LogFile())->writeError('Function setMonth: No number');
        }

        $this->setDefault();
        $this->date->setDate($this->getYear(), $month, $this->getDayOfMonth());
        return $this;
    }


    public function setYear($year)
    {

        if (!is_numeric($year)) {
            (new LogFile())->writeError('Function setYear: No number');
        }

        $this->setDefault();
        $this->date->setDate($year, $this->getMonthNumber(), $this->getDayOfMonth());
        return $this;
    }


    public function addDay($day)
    {
        $this->setDefaultNow();
        $this->date->modify('+ ' . $day . ' day');
        return $this;
    }


    public function minusDay($day)
    {
        $this->setDefaultNow();
        $this->date->modify('- ' . $day . ' day');
        return $this;
    }


    public function addMonth($month)
    {
        $this->setDefaultNow();
        $this->date->modify('+ ' . $month . ' month');
        return $this;
    }


    public function addYear($year)
    {
        $this->setDefaultNow();
        $this->date->modify('+ ' . $year . ' year');
        return $this;
    }


    public function addMinute($minute)
    {
        $this->setDefaultNow();
        $this->date->modify('+ ' . $minute . ' minutes');
        return $this;
    }



    // getIsoDate
    public function getIsoDateFormat()
    {
        $value = (string)$this->getFormat('Y-m-d');
        return $value;
    }


    public function getLongFormat()
    {

        $text='';
        if ($this->hasValue()) {
        $text = $this->getDayOfMonth() . '. ' . $this->getMonth() . ' ' . $this->getYear();
        }
        return $text;
    }


    public function getLongFormatWithWeekday()
    {
        $date = $this->getWeekday() . ', ' . $this->getLongFormat();
        return $date;
    }


    public function getLongFormatWithWeekdayWithoutYear()
    {
        $date = $this->getWeekday() . ', ' . $this->getDayOfMonth() . '. ' . $this->getMonth();
        return $date;
    }


    public function getShortDateFormat()
    {
        return $this->getFormat('j.n.Y');
    }


    public function getShortDateLeadingZeroFormat()
    {
        return $this->getFormat('d.m.Y');
    }


    public function getDayOfMonth()
    {
        return $this->getFormat('j');
    }


    public function getDayOfYear()
    {

        // plus 1 !!!!!!!!!!

        $dayOfYear = $this->getFormat('z');
        return $dayOfYear;


        //$dayOfYear = $this->date->format('z') + 1;
        //return $dayOfYear;
    }

    // getCalendarWeek
    public function getWeekNumber()
    {

        $weekNumber = (int)$this->getFormat('W');
        return $weekNumber;

    }


    public function getWeekYearNumber() {

        $number= (new WeekYearNumber())->getWeekYearNumber($this->getWeekNumber(),$this->getYear());
        return $number;

    }


    public function getMonthYearNumber() {

        //$number= (new WeekYearNumber())->getWeekYearNumber($this->getWeekNumber(),$this->getYear());

        $number = ($this->getYear() * 12) + $this->getMonthNumber();
        return $number;

    }


    public function getWeekday()
    {
        $weekday = (new Weekday())->getWeekday($this->getWeekdayNumber());
        return $weekday;
    }


    public function getWeekdayNumber()
    {
        return (int)$this->getFormat('N');
    }

    // getMonthLabel
    public function getMonth()
    {
        $month = (new Month())->getMonth($this->getMonthNumber());
        return $month;
    }


    // getMonath
    public function getMonthNumber()
    {
        return $this->getFormat('n');
    }


    public function getMonthNumberWithLeadingZero()
    {
        return $this->getFormat('m');
    }


    public function getDayWithLeadingZero()
    {
        return $this->getFormat('d');
    }


    public function getYear()
    {
        return $this->getFormat('Y');
    }


    public function getYear2Digit()
    {
        return $this->getFormat('y');
    }


    // isWorkingDay
    public function isWeekDay()
    {

        $returnValue = false;
        $weekdayNumber = $this->getWeekdayNumber();
        if ($weekdayNumber <=5) {
            $returnValue = true;
        }
        return $returnValue;

    }

    public function isWeekend()
    {
        $returnValue = false;
        $weekdayNumber = $this->getWeekdayNumber();
        if (($weekdayNumber == 6) || ($weekdayNumber == 7)) {
            $returnValue = true;
        }
        return $returnValue;
    }


    public function isDateInThePast()
    {

        $value = false;

        $now = new \DateTime();
        $now->setTime(0, 0);
        if ($this->date < $now) {
            $value = true;
        }

        return $value;

    }


    public function isDateTimeInThePast()
    {

        $value = false;

        $now = new \DateTime();
        //$now->setTime(0, 0);
        if ($this->date < $now) {
            $value = true;
        }

        return $value;

    }

    public function getTimestamp()
    {
        $timestamp = $this->date->getTimestamp();
        return $timestamp;
    }

}