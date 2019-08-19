<?php

namespace Nemundo\Core\TextFile\Writer;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractTextFileWriter extends AbstractBase
{

    /**
     * @var string
     */
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    abstract public function addLine($line);

}