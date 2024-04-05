<?php

namespace Nemundo\Core\WebRequest\Curl;

class JsonCurlWebRequest extends CurlWebRequest
{

    public function __construct()
    {

        parent::__construct();

        $this->addHeader('accept: application/json');


        /*->addHeader('Content-Type' => 'application/json'');



        'Accept' => 'application/json',
    'Authorization' => 'Bearer {access-token}',
    'Content-Type' => 'application/json',
);*/

    }

}