<?php

namespace Nemundo\Core\Json\Writer;

use Nemundo\Core\Base\Writer\AbstractWriter;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class JsonFileWriter extends AbstractWriter
{


    //private $data;

    /**
     * @var array
     */
    public $jsonData = [];

    /**
     * @var bool
     */
    public $formatJson = true;


    public function writeFile()
    {


        $data = new JsonText();
        $data->formatJson=$this->formatJson;
        $data->addData($this->jsonData);


        $file = new TextFileWriter($this->filename);
        $file->overwriteExistingFile=$this->overwriteExistingFile;
        $file->addLine($data->getJson());
        $file->writeFile();


        // TODO: Implement writeFile() method.
    }


}