<?php

namespace Nemundo\Core\Base\Writer;

use Nemundo\Core\Base\AbstractBase;


// AbstractFileWriter
abstract class AbstractWriter extends AbstractBase
{

    public $filename;


    /**
     * @var bool
     */
    public $overwriteExistingFile = false;


    abstract public function writeFile();

}