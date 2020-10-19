<?php

namespace Nemundo\Core\Csv\Reader;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

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

    protected function checkFileExists()
    {

        if (!(new File($this->filename))->fileExists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            exit;
        }

    }

}