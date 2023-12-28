<?php

namespace Nemundo\Core\Converter;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class UrlConverter extends AbstractBase
{

    private $url;

    public function __construct($url) {

        $this->url = $url;

    }

    public function getText() {

        $text = (new Text($this->url))
            ->replaceLeft('https://','')
            ->replaceLeft('http://','')
            ->replaceRight('/','')
            ->getValue();

        return $text;

    }

}