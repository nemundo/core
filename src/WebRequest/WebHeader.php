<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Base\AbstractBase;

class WebHeader extends AbstractBase
{

    private $headerList = [];

    public function __construct($url)
    {


        $header = get_headers($url, true);

        if ($header !== false) {
            $this->headerList = get_headers($url, true);
            $this->headerList = array_change_key_case($this->headerList);
        }

    }


    public function getContentType()
    {

        $contentType = null;
        if (isset($this->headerList['content-type'])) {
            $contentType = $this->headerList['content-type'];
            if (is_array($contentType)) {
                $contentType = $contentType[0];
            }
        }

        return $contentType;

    }


    public function getResponseCode()
    {

        //$this->getHeader($url);
        $responseCode = null;
        if (isset($this->headerList[0])) {
            $responseCode = (int)substr($this->headerList[0], 9, 3);
        }

        return $responseCode;

    }

    public function getHeader()
    {

        return $this->headerList;

    }

}