<?php

namespace Nemundo\Core\Http\Parameter;



use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractParameter extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $parameterName;


    abstract protected function loadParameter();

    abstract public function getUrl();


    public function __construct()
    {
        $this->loadParameter();
    }

    public function exists()
    {

        $returnValue = false;
        if (isset($_REQUEST[$this->parameterName])) {
            $returnValue = true;
        }
        return $returnValue;

    }


    public function notExists()
    {

        $returnValue = !$this->exists();
        return $returnValue;

    }

    public function getParameterName()
    {
        return $this->parameterName;
    }



}