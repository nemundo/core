<?php

namespace Nemundo\Core\WebRequest\Curl;

abstract class AbstractJsonCurlWebRequest extends AbstractCurlWebRequest
{

    public function __construct()
    {

        parent::__construct();
        $this->addHeader('accept: application/json');

    }

}