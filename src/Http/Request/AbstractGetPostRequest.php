<?php

namespace Nemundo\Core\Http\Request;


use Nemundo\Core\Http\Request\AbstractRequest;

class AbstractGetPostRequest extends AbstractRequest
{

    /**
     * @var string
     */
    public $defaultValue = '';

}