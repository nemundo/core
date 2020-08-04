<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractCsvReader extends AbstractDataSource
{

    use CsvTrait;

}