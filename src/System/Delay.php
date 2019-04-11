<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;

class Delay extends AbstractBase
{

    public function delay($second)
    {
        sleep($second);
    }

}