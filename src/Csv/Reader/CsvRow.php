<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractRow;

class CsvRow extends AbstractRow
{

    public function hasValue($name)
    {
        return parent::hasValue($name);
    }


    public function getValue($name)
    {
        return parent::getValue($name);
    }


    public function getValueByNumber($number)
    {
        return parent::getValueByNumber($number);
    }

}