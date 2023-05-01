<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class UrlText extends AbstractBase
{

    public function getUrlText($url) {

        $urlText = (new Text($url))
            ->removeLeft('https://')
            ->removeLeft('http://')
            ->getValue();

        return $urlText;

    }

}