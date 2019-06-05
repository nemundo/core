<?php

namespace Nemundo\Core\Type\Number;


use Nemundo\Core\Type\AbstractType;

class YesNo extends AbstractType
{

    public function getText()
    {

        $text = 'false';
        if ($this->value) {
            $text = 'true';
        }

        return $text;

    }

}