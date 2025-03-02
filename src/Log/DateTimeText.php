<?php

namespace Nemundo\Core\Log;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Text\Text;

class DateTimeText extends AbstractBase
{

    public function getDateTimeText()
    {

        $dateTime = (new DateTime())->setNow();
        $dateTimeText = (new Text($dateTime->getIsoDateTime()))
            ->replace(':', '_')
            ->replace('-', '_')
            ->replace(' ', '_')
            ->getValue();

        return $dateTimeText;

    }

}