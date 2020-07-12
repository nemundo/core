<?php


namespace Nemundo\Core\Csv\Reader;


trait CsvTrait
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public $useFirstRowAsHeader = true;

    /**
     * @var bool
     */
    public $utf8Encode = false;

    /**
     * @var int
     */
    public $lineOfStart = 0;

}