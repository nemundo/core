<?php

namespace Nemundo\Core\WebRequest\Curl;

class JsonCurlWebRequest extends CurlWebRequest
{

    public function __construct()
    {

        parent::__construct();
        $this->addHeader('accept: application/json');

    }

}