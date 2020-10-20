<?php


namespace Nemundo\Core\Date\Week;


use Nemundo\Core\Base\AbstractBase;

class WeekYearNumber extends AbstractBase
{

    public function getWeekYearNumber($week, $year)
    {

        $weekYear = ($year * 52) + $week;
        return $weekYear;

    }


    public function getText()
    {

    }

}