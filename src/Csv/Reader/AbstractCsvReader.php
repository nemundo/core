<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractCsvReader extends AbstractDataSource
{

    use CsvTrait;

    /**
     * @var string
     */
    //public $filename;

    /**
     * @var bool
     */
    //public $useFirstRowAsHeader = true;

    /**
     * @var bool
     */
    //public $utf8Encode = false;

    /**
     * @var int
     */
    //public $lineOfStart = 0;

}