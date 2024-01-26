<?php

namespace Nemundo\Core\Http\Header;

use Nemundo\Core\Base\AbstractBase;

class HttpHeader extends AbstractBase
{

    public function sendHeader($header) {

        header($header);
        return $this;

    }


    public function addAccessControlAllowOrigin($url='*') {

        $this->sendHeader('Access-Control-Allow-Origin:'.$url);
        return $this;

    }

}