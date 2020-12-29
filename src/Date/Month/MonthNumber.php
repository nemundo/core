<?php


namespace Nemundo\Core\Date\Month;


use Nemundo\Core\Base\AbstractBase;

class MonthNumber extends AbstractBase
{


    public function getMonthNumber($monthText) {


        $monthList = ['Jan','Feb','Mrz','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez'];
        $monthNumber = array_search($monthText,$monthList);
        $monthNumber++;

        return $monthNumber;



    }


}