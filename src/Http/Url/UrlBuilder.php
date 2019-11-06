<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\AbstractGetRequest;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\WebConfig;


class UrlBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var string[]
     */
    protected $requestList;

    function __construct($url = null)
    {

        $this->url = $url;

        if ($this->url == null) {
            $this->url = $_SERVER['REQUEST_URI'];
        }

        // temporäres GET Array
        //$this->get = $_GET;
        // muss aus parse_url ausgelesen werden!!!

        parse_str(parse_url($this->url, PHP_URL_QUERY), $this->requestList);

    }




    public function addRequestValue($requestName, $value = '')
    {
        $this->requestList[$requestName] = $value;
        return $this;
    }


    public function addRequest(AbstractGetRequest $parameter)
    {
        $this->requestList[$parameter->getRequestName()] = $parameter->getValue();
        return $this;
    }


    public function removeParameter(AbstractGetRequest $paramter)
    {
        unset($this->requestList[$paramter->getRequestName()]);
        return $this;
    }


    public function removeAllParameter()
    {
        $this->requestList = [];
        return $this;
    }


    public function getUrl()
    {

        $url = strtok($this->url, '?');

        if (sizeof($this->requestList) > 0) {
            $query_string = http_build_query($this->requestList);
            $url = $url . '?' . $query_string;
        }

        return $url;

    }

}