<?php

namespace Nemundo\Core\Xml\WebRequest;

use Nemundo\Core\WebRequest\Curl\AbstractCurlWebRequest;

abstract class AbstractXmlWebRequest extends AbstractCurlWebRequest
{

    public function __construct()
    {

        parent::__construct();
        $this->addHeader('Content-Type: application/xml');

    }

}