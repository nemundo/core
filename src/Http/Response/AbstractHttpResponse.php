<?php

namespace Nemundo\Core\Http\Response;


abstract class AbstractHttpResponse extends AbstractResponse
{

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $contentType = ContentType::HTML;

    /**
     * @var string
     */
    protected $attachmentFilename;


    protected $filesize;


    // render()
    public function sendResponse()
    {

        header('Content-type: ' . $this->contentType . '; charset=utf-8');
        //header('Content-type: ' . $this->contentType);

        //$filesize = filesize($filename);

        //header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        //header("Content-Type: application/zip");

        if ($this->filesize !== null) {
            header('Content-Length: ' . $this->filesize);
        }

        // Attachment Filename
        if ($this->attachmentFilename !== null) {
            header('Content-Disposition: attachment; filename="' . $this->attachmentFilename . '"');
        }

        $this->sendStatusCode();


        //readfile($file);



        if ($this->content !== null) {
            if (is_array($this->content)) {
                $content = implode(PHP_EOL, $this->content);
            } else {
                $content = $this->content;
            }
            $content = trim($content);
            echo $content;

            // braucht es dieses exit???
            //exit;


        }

    }

}
