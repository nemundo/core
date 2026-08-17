<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Base\AbstractBase;

class WebHeader extends AbstractBase
{

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

        curl_exec($ch);
        $this->headerList = curl_getinfo($ch);

    }


    public function getValue($name)
    {

        $value = null;
        if (isset($this->headerList[$name])) {
            $value = $this->headerList[$name];
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
        $list[] = $this->headerList['url'];

        return $list;

    }

}