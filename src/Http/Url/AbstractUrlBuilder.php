<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\AbstractGetRequest;


abstract class AbstractUrlBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $url;

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


    public function getUrl()
    {

        $url = strtok($this->url, '?');

        if (sizeof($this->requestList) > 0) {
            $queryString = http_build_query($this->requestList);
            $url = $url . '?' . $queryString;
        }

        return $url;

    }


}