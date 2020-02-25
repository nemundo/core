<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\AbstractGetRequest;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\WebConfig;



// UrlInformation
class Url extends AbstractBaseClass
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


    public function getParameterList()
    {
        return $this->requestList;
    }


    public function getRequestList($parameter)
    {

        $value = '';
        if (isset($this->requestList[$parameter])) {
            $value = $this->requestList[$parameter];
        }

        return $value;

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


    // seperate !!!
   /* public function getUrlList($removePrefixUrl = '')
    {

        $requestUri = strtok($this->url, '?');

        $uri = new Text($requestUri);
        $uri->removeLeft(WebConfig::$webUrl . $removePrefixUrl);
        $uri->removeRight('/');

        $list = $uri->split('/');


        // Home Url
        if (sizeof($list) == 0) {
            $list[] = '';
        }

        return $list;

    }*/


    public function getUrlPart($number)
    {

        $list = $this->getUrlList();

        $part = '';
        if (isset($list[$number])) {
            $part = $list[$number];
        }
        return $part;

    }


    /*
    public function redirect()
    {

        (new UrlRedirect())->redirect($this->getUrl());

    }*/


    public function getUrlWithoutParameter()
    {

        $url = strtok($this->url, '?');
        return $url;

    }


    // class UrlInformation


    public function getHost()
    {
        $host = parse_url($this->url, PHP_URL_HOST);
        return $host;
    }


    public function getProtocol()
    {
        $protocol = parse_url($this->url, PHP_URL_SCHEME);
        return $protocol;
    }


    public function getFilenameExtension()
    {

        $path_info = pathinfo($this->url);
        $filenameExtension = '';
        if (isset($path_info['extension'])) {
            $filenameExtension = $path_info['extension'];
        }

        return $filenameExtension;

    }


    public function isSecure()
    {

    }


    public function getHeader()
    {
        return get_headers($this->url);
    }

    public function getResponseCode()
    {

        $responseCode = get_headers($this->url)[0];
        $responseCode = substr($responseCode, 9, 3);
        return $responseCode;

    }


    public function existsUrl()
    {

        $returnValue = false;
        if ($this->getResponseCode() == '200') {
            $returnValue = true;
        }
        return $returnValue;

    }


}