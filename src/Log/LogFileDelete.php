<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\Directory;

class LogFileDelete extends AbstractBase
{


    public function deleteLog()
    {

        (new Directory(LogConfig::$logPath))
            ->deleteDirectory(false);

    }

}