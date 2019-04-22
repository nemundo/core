<?php

namespace Nemundo\Core\Http\Parameter;


use Nemundo\Core\Log\LogMessage;

abstract class AbstractMultipleUrlParameter extends AbstractParameter
{


    private $valueList = [];


    public function __construct($valueList =[])
    {

        if (!is_array($valueList)) {
            (new LogMessage())->writeError('AbstractMultpleUrlParameter: No valid Array');
        }

        parent::__construct();
        $this->valueList = $valueList;

    }


    public function addValue($value)
    {

        $this->valueList[] = $value;
        return $this;

    }


    // getValueList
    // getValue
    public function getMulipleValue()
    {

        $list = $this->valueList;
        if (isset($_REQUEST[$this->parameterName])) {
            foreach ($_REQUEST[$this->parameterName] as $value) {
                $list[] = trim($value);
            }
        }

        return $list;

    }


    public function getUrl()
    {

        $urlList = [];
        foreach ($this->getMulipleValue() as $value) {
            $urlList[] = $this->parameterName . '[]=' . $value;
        }

        $url = '';
        if (sizeof($urlList) > 0) {
            $url = join('&', $urlList);
        }

        return $url;

    }


    public function getJson()
    {

        $json = json_encode($this->getMulipleValue());
        return $json;

    }

}