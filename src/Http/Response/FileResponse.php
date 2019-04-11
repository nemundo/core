<?php

namespace Nemundo\Core\Http\Response;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class FileResponse extends AbstractResponse
{

    /**
     * @var ContentType
     */
    public $contentType = ContentType::HTML;

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $responseFilename;


    public function sendResponse()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }

        $file = new File($this->filename);


        if (!$file->exists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            return;
        }

        if ($this->responseFilename == null) {
            $this->responseFilename = $file->filename;
        }


        //header('Content-Description: File Transfer');
        $this->sendStatusCode();

        // Content Type
        /*switch ($file->getFileExtension()) {
            case "pdf":
                header('Content-Type: application/pdf');
                break;


            default:
                header('Content-Type: application/octet-stream');
        }*/

        header('Content-type: ' . $this->contentType);

        header('Content-Disposition: attachment; filename="' . $this->responseFilename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file->fullFilename));
        readfile($file->fullFilename);

    }

}