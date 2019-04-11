<?php

namespace Nemundo\Core\Config;


use Nemundo\Core\File\TextFile;

class ConfigWriter
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
     * @var TextFile
     */
    private $textFile;

    private $data;

    public function __construct()
    {
        $this->textFile = new TextFile();
    }

    public function add($name, $value = '')
    {

        $this->textFile->filename = $this->filename;

        $this->data[] = $name . '=' . $value;
        $this->textFile->addLine($name . '=' . $value);
    }

    public function getData()
    {
        return $this->data;
    }

    public function writeFile()
    {

/*        $this->textFile->filename = $this->filename;
        $this->textFile->overwriteExistingFile = $this->overwriteExistingFile;
        $this->textFile->saveFile();*/

    }


}