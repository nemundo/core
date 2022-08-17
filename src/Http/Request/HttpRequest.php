<?php


namespace Nemundo\Core\Http\Request;


class HttpRequest extends AbstractHttpRequest
{

    public function __construct($requestName)
    {
        parent::__construct();
        $this->requestName = $requestName;

    }

    protected function loadRequest()
    {

    }

}