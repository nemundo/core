<?php

namespace Nemundo\Core\Date\Month;

use Nemundo\Core\Base\AbstractBase;

class DayOfMonth extends AbstractBase
{

    public function getDayOfMonth($month, $year) {

        return cal_days_in_month(CAL_GREGORIAN, $month, $year);

    }

}