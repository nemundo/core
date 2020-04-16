<?php


namespace Nemundo\Core\File\Pdf;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractFile extends AbstractBase
{

    protected $filename;

    public function __construct($filename)
    {
        $this->filename=$filename;
    }

}