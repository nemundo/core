<?php

namespace Nemundo\Core\WebRequest\Curl;

class BearerAuthenticationWebRequest extends AbstractJsonCurlWebRequest
{

    public $bearerAuthentication;

    private $loadedAuthentication = false;

    protected function loadRequest()
    {

    }


    public function getUrl($url)
    {

        if (!$this->loadedAuthentication) {
            $this->addHeader('Authorization: Bearer ' . $this->bearerAuthentication);
            $this->loadedAuthentication = true;
        }

        return parent::getUrl($url);

    }

}