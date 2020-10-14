<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractCsvReader extends AbstractDataSource
{

    use CsvTrait;

    protected $header=[];


    public function getHeader() {

        $this->getData();
        return $this->header;

    }


}