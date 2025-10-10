<?php

namespace Nemundo\Core\WebRequest\BearerAuthentication;

use Nemundo\Core\WebRequest\Curl\AbstractCurlWebRequest;

abstract class AbstractBearerAuthenticationWebRequest extends AbstractCurlWebRequest
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
        return parent::postUrl($url, $data);

    }


    public function deleteUrl($url)
    {
        $this->authentication();
        return parent::deleteUrl($url);

    }

    private function authentication()
    {
        if (!$this->loadedAuthentication) {
            $this->addHeader('Authorization: Bearer ' . $this->bearerAuthentication);
            $this->loadedAuthentication = true;
        }
    }


}