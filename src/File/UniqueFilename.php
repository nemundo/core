<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Random\UniqueId;

class UniqueFilename
{

    public function getUniqueFilename($fileExtension)
    {

        $filename = (new UniqueId())->getUniqueId() . '.' . $fileExtension;
        return $filename;
    }

}