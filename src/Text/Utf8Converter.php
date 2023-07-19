<?php

namespace Nemundo\Core\Text;

use Nemundo\Core\Base\AbstractBase;

class Utf8Converter extends AbstractBase
{

    public function utf8Encode($text) {

        $text = mb_convert_encoding($text, 'UTF-8', 'ISO-8859-1');
        return $text;

    }

}