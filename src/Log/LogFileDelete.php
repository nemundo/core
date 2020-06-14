<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\Directory;
use Nemundo\Project\Path\LogPath;

class LogFileDelete extends AbstractBase
{


    public function deleteLog()
    {

        (new LogPath())->deleteDirectory(false);

        /*
        (new Directory(LogConfig::$logPath))
            ->deleteDirectory(false);
*/

    }

}