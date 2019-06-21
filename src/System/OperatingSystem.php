<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;

class OperatingSystem extends AbstractBase
{

    public function getOperatingSystem()
    {

        $os = PHP_OS;
        return $os;

    }


    public function isLinux()
    {

    }


    public function isWindows()
    {


    }

}