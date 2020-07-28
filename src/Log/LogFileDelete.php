<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\Path\LogPath;

class LogFileDelete extends AbstractBase
{

    public function deleteLog()
    {

        (new LogPath())->emptyDirectory();

    }

}