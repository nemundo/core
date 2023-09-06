<?php

namespace Nemundo\Core\Xml\WebRequest;

use Nemundo\Core\WebRequest\CurlWebRequest;

class XmlWebRequest extends CurlWebRequest
{

    public function __construct()
    {

        parent::__construct();
        $this->addHeader('Content-Type: application/xml');

    }

}