<?php

namespace Nemundo\Core\Type\Number;


use Nemundo\Core\Type\AbstractType;

class YesNo extends AbstractType
{


    public function getText()
    {

        $text = ($this->value) ? 'true' : 'false';
        return $text;

    }


}