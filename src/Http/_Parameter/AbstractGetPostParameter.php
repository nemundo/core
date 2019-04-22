<?php

namespace Nemundo\Core\Http\Parameter;


use Nemundo\Core\Log\LogMessage;


// AbstractGetParameter
abstract class AbstractGetPostParameter extends AbstractParameter
{

    /**
     * @var string
     */
    protected $defaultValue = '';

    /**
     * @var string
     */
    protected $value;


    abstract public function existsParameter();

    abstract protected function valueParamter();


    public function __construct($value = null)
    {
        parent::__construct();
        $this->value = $value;
    }


    public function getValue()
    {

        $value = $this->value;
        if ($value === null) {
            $value = $this->defaultValue;
        }

        if ($this->value === null) {
            if ($this->existsParameter() ) {
            //if (isset($_REQUEST[$this->parameterName])) {
                $value = $this->valueParamter();  // $_REQUEST[$this->parameterName];
                $value = trim($value);
            }
        }

        return $value;

    }


    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


    public function hasValue()
    {


        $returnValue = true;

        $value = $this->getValue();
        if (($value == '') || ($value == '0')) {
            $returnValue = false;
        }

        return $returnValue;

    }


    public function getUrl()
    {

        if (is_array($this->value)) {
            (new LogMessage())->writeError('Array' . $this->getParameterName());
            (new LogMessage())->writeError($this->getClassName());

        }

        $url = $this->parameterName . '=' . urlencode($this->getValue());

        return $url;

    }

}