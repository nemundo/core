<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\AbstractGetRequest;
use Nemundo\Core\Type\Text\Text;



// UrlInformation
class _UrlItem extends AbstractBaseClass
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


    public function getParameterValue($parameterName)
    {

        $value = '';
        if (isset($this->requestList[$parameterName])) {
            $value = $this->requestList[$parameterName];
        }

        return $value;

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





}