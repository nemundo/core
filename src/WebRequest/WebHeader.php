<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Base\AbstractBase;

class WebHeader extends AbstractBase
{

    private $headerList=[];

    public function __construct($url) {

        $this->headerList = get_headers($url, true);
        $this->headerList = array_change_key_case($this->headerList);

    }


    public function getContentType() {

        $contentType = null;
        if (isset($this->headerList['content-type'])) {
            $contentType = $this->headerList['content-type'];
            if (is_array($contentType)) {
                $contentType = $contentType[0];
            }
        }

        return $contentType;

    }


    public function getHeader() {

        return $this->headerList;

    }

}