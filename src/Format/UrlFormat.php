<?php

namespace Nemundo\Core\Format;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class UrlFormat extends AbstractBase
{

    public function getUrlFormat($url)
    {

        return (new Text($url))
            ->replaceLeft('https://', '')
            ->replaceRight('/', '')
            ->getValue();

    }

}