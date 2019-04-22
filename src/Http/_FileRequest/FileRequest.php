<?php

namespace Nemundo\Core\Http\FileRequest;



use Nemundo\Core\Type\File\File;


class FileRequest extends FileUpload
{

    public function __construct($name)
    {

        $this->filename = $_FILES[$name]['name'];
        $this->tmpFileName = $_FILES[$name]['tmp_name'];
        $this->fileSize = $_FILES[$name]['size'];
        $this->errorCode = $_FILES[$name]['error'];

        $file = new File($this->filename);
        $this->filenameExtension = $file->getFileExtension();

    }

}