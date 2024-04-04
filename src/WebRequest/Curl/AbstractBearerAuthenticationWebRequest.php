<?php

namespace Nemundo\Core\WebRequest\Curl;

abstract class AbstractBearerAuthenticationWebRequest extends AbstractJsonCurlWebRequest
{

    protected $bearerAuthentication;

    private $loadedAuthentication = false;

    protected function loadRequest()
    {

    }


    public function getUrl($url)
    {

        $this->authentication();
        return parent::getUrl($url);

    }


    public function postUrl($url, $data)
    {

        $this->authentication();
        return parent::getUrl($url);

    }


    private function authentication()
    {
        if (!$this->loadedAuthentication) {
            $this->addHeader('Authorization: Bearer ' . $this->bearerAuthentication);
            $this->loadedAuthentication = true;
        }
    }


}