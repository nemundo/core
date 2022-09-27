<?php

namespace Nemundo\Core\WebRequest\Curl;

use Nemundo\Core\WebRequest\CurlWebRequest;

class JsonCurlWebRequest extends CurlWebRequest
{

    public function __construct()
    {

        parent::__construct();
        $this->addHeader('accept: application/json');

    }

}