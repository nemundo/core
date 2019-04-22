<?php

namespace Nemundo\Core\Http;


class RequestMethod
{


    public function getRequestMethod() {

       $value= $_SERVER['REQUEST_METHOD'];
        return $value;
    }


    public function isPost() {

    }


    public function isGet() {

    }



}