<?php

namespace Nemundo\Core\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class ConfigWriter extends AbstractBase
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var TextFileWriter
     */
    private $textFile;

    private $data;

    public function __construct($filename)
    {
        $this->textFile = new TextFileWriter($filename);
    }


    public function add($name, $value = '')
    {
        $this->data[] = $name . '=' . $value;
        $this->textFile->addLine($name . '=' . $value);
    }


    public function getData()
    {
        return $this->data;
    }


    public function writeFile()
    {
        $this->textFile->saveFile();

    }

}