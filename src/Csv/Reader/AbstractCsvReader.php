<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

abstract class AbstractCsvReader extends AbstractDataSource
{

    use CsvTrait;

    protected $header = [];


    public function getHeader()
    {

        $this->getData();
        return $this->header;

    }

}