<?php

namespace Nemundo\Core\WebRequest\BearerAuthentication;

use Nemundo\Core\WebRequest\HeaderTrait;

abstract class AbstractXmlBearerAuthenticationWebRequest extends AbstractBearerAuthenticationWebRequest
{

    use HeaderTrait;

    public function __construct()
    {
        parent::__construct();
        $this->loadXml();

    }

}