<?php

namespace Nemundo\Core\WebRequest\Curl;

class JsonCurlWebRequest extends CurlWebRequest
{

    public function __construct()
    {

        parent::__construct();

        $this
            ->addHeader('Accept: application/json')
            ->addHeader('Content-Type: application/json');

    }

}