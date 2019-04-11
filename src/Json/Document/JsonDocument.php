<?php

namespace Nemundo\Core\Json\Document;

use Nemundo\Core\File\TextFile;

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

        $json = new TextFile();
        $json->overwriteExistingFile = true;
        $json->filename = $this->filename;
        $json->addLine($this->getContent());
        //$json->saveFile();

    }


    /*
    public function sendToBrowser() {

        $response = new HttpResponse();
        //$response->contentType = ContentType::JSON;
        $response->content = json_encode($this->data);
        $response->sendResponse();

    }*/


}