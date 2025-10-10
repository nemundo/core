<?php

namespace Nemundo\Core\WebRequest\Curl;

use Nemundo\Core\WebRequest\Json\AbstractJsonCurlWebRequest;

abstract class AbstractBasicAuthenticationWebRequest extends AbstractJsonCurlWebRequest
{

    protected $basicAuthentication;

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
            $this->addHeader('Authorization: Basic ' . base64_encode($this->basicAuthentication));
            $this->loadedAuthentication = true;
        }
    }

}