<?php

namespace Nemundo\Core\Http\Request;



use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $requestName;


    public function __construct($requestName)
    {

        $this->requestName = $requestName;

    }


    public function notExists()
    {

        $returnValue = !$this->exists();
        return $returnValue;

    }


    public function getRequestName()
    {
        return $this->requestName;
    }

}