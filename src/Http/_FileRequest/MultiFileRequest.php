<?php

namespace Nemundo\Core\Http\FileRequest;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\File\File;


// FileRequestList
class MultiFileRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * @return FileUpload[]
     */
    public function getUploadFile()
    {

        $fileUploadList = array();

        if (isset($_FILES[$this->name])) {
            $count = sizeof($_FILES[$this->name]['name']);

            for ($n = 0; $n < $count; $n++) {

                if ($_FILES[$this->name]['name'][$n] !== '') {

                    $fileUpload = new FileUpload();
                    $fileUpload->filename = $_FILES[$this->name]['name'][$n];
                    $fileUpload->tmpFileName = $_FILES[$this->name]['tmp_name'][$n];
                    $fileUpload->fileSize = $_FILES[$this->name]['size'][$n];
                    $fileUpload->errorCode = $_FILES[$this->name]['error'][$n];

                    $file = new File($fileUpload->filename);
                    $fileUpload->filenameExtension = $file->getFileExtension();

                    $fileUploadList[] = $fileUpload;
                }

            }
        }

        return $fileUploadList;

    }

}