<?php

namespace Nemundo\Core\Http\Request;



use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $requestName;


    //abstract protected function loadParameter();

    //abstract public function getUrl();


    public function __construct($requestName)
    {
        //$this->loadParameter();

        $this->requestName = $requestName;

    }


    /*
    public function exists()
    {

        $returnValue = false;
        if (isset($_REQUEST[$this->requestName])) {
            $returnValue = true;
        }
        return $returnValue;

    }*/


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