<?php


namespace Nemundo\Core\WebRequest;


use Nemundo\Core\Base\AbstractBase;

class WebResponse extends AbstractBase
{

    // httpCode
    public $statusCode;

    public $html;

    public $url;

    public $errorMessage;

}