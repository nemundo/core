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

        $value = false;
        if ($this->getOperatingSystem() == 'LINUX') {
            $value = true;
        }

        return $value;

    }


    public function isWindows()
    {

        $value = false;
        if ($this->getOperatingSystem() == 'WINNT') {
            $value = true;
        }

        return $value;

    }

}