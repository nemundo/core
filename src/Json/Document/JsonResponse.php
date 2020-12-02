<?php

namespace Nemundo\Core\Json\Document;


use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;


// AbstractDocument
class JsonResponse extends AbstractJson
{

    public $filename;

    public function render()
    {

        $response = new HttpResponse();
        $response->contentType = ContentType::JSON;
        $response->content = $this->getContent();
        $response->attachmentFilename=$this->filename;
        $response->sendResponse();

    }

}