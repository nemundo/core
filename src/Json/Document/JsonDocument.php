<?php

namespace Nemundo\Core\Json\Document;

use Nemundo\Core\TextFile\Writer\TextFileWriter;

class JsonDocument extends AbstractJson
{

    /**
     * @var string
     */
    public $filename;

    public function getContent()
    {
        return parent::getContent();
    }


    public function writeFile()
    {

        $json = new TextFileWriter($this->filename);
        $json->overwriteExistingFile = true;
        $json->createDirectory = true;
        $json->addLine($this->getContent());
        $json->saveFile();

    }

}