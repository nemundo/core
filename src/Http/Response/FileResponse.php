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


        if (!$file->fileExists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            return;
        }

        if ($this->responseFilename == null) {
            $this->responseFilename = $file->filename;
        }

        session_write_close();

        $this->sendStatusCode();

        $contentType = 'application/octet-stream';
        switch ($file->getFileExtension()) {
            case 'pdf':
                $contentType = ContentType::PDF;
                break;

            case 'png':
                $contentType = 'image/png';
                break;

            case 'svg':
                $contentType = 'image/svg+xml';
                break;

        }

        header('Content-type: ' . $contentType);
        header('Content-Disposition: attachment; filename="' . $this->responseFilename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file->fullFilename));

        readfile($file->fullFilename);

    }

}