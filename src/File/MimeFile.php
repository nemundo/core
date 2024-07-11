<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class MimeFile extends AbstractBase
{

    private $filename;

    public $mime;

    public $mimeType;

    public $fileType;


    public function __construct($filename)
    {
        $this->filename = $filename;

        $this->mime = mime_content_type($this->filename);

        $mimeList = (new Text($this->mime))->split('/');

        if (isset($mimeList[0])) {
            $this->mimeType = $mimeList[0];
        }

        if (isset($mimeList[1])) {
            $this->fileType = $mimeList[1];
        }

    }


    public function isImage()
    {

        $value = false;

        if ($this->mimeType == 'image') {
            $value = true;
        }

        return $value;

    }



}