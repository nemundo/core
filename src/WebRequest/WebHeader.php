<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class WebHeader extends AbstractBase
{

    //public $location;

    private $headerList = [];

    public function __construct($url)
    {


        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_NOBODY => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0',
            CURLOPT_REFERER => $url,
        ]);

        $response = curl_exec($ch);
        $this->headerList = curl_getinfo($ch);  //, CURLINFO_HTTP_CODE);
        curl_close($ch);


        /*$header = @get_headers($url, true);

        if ($header !== false) {
            $this->headerList = get_headers($url, true);
            $this->headerList = array_change_key_case($this->headerList);
        } else {
            $error = error_get_last();
            (new Debug())->write('Web Header Error: ' . $error['message']);
        }*/

    }


    public function getValue($name)
    {

        $value = null;
        if (isset($this->headerList[$name])) {
            $value = $this->headerList[$name];
            /*if (is_array($contentType)) {
                $contentType = $contentType[0];
            }*/
        }

        return $value;

    }


    public function getContentType()
    {

        $contentType = null;
        if (isset($this->headerList['content_type'])) {
            $contentType = $this->headerList['content_type'];
            if (is_array($contentType)) {
                $contentType = $contentType[0];
            }
        }

        return $contentType;

    }


    public function getResponseCode()
    {

        //$this->getHeader($url);
        /*$responseCode = null;
        if (isset($this->headerList[0])) {
            $responseCode = (int)substr($this->headerList[0], 9, 3);
        }*/

        $responseCode = $this->headerList['http_code'];
        return $responseCode;

    }

    public function getHeader()
    {

        return $this->headerList;

    }


    public function getLocationList()
    {

        $list = [];
        $list[]= $this->headerList['url'];

        /*if (isset($this->headerList['location'])) {
            $location = $this->headerList['location'];

            if (is_array($location)) {
                $list = $location;
            } else {
                $list[] = $location;
            }

        }*/

        return $list;

    }

}