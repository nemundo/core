<?php

namespace Nemundo\Core\Json\Document;


use Nemundo\Web\Http\Response\ContentType;
use Nemundo\Web\Http\Response\HttpResponse;

class JsonResponse extends AbstractJson
{


    public function render()
    {

        $response = new HttpResponse();
        $response->contentType = ContentType::JSON;
        $response->content = json_encode($this->data);
        $response->sendResponse();

    }


}