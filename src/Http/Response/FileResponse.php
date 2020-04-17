<?php

namespace Nemundo\Core\Http\Response;


use Nemundo\Core\Debug\Debug;
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



/*
    public function sendResponse()
    {
        // TODO: Implement sendResponse() method.

        $file = $this->filename;  // 'monkey.gif';

        if (file_exists($file)) {

            session_write_close();

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));

            //ob_clean();
            //flush();

            readfile($file);
            exit;


        } else {
            (new Debug())->write('file does not exist');
        }


    }*/



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


        /*
        if (isset($_SERVER['HTTP_RANGE'])) {


            //https://codesamplez.com/programming/php-html5-video-streaming-tutorial

            $stream = fopen($file->fullFilename, 'rb');

            $buffer = 102400;
            $start = 0;
            $size = filesize($file->fullFilename);
            $end = $size - 1;


            $c_start = $start;
            $c_end = $end;

            list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
            if (strpos($range, ',') !== false) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $start-$end/$size");
                exit;
            }
            if ($range == '-') {
                $c_start = $size - substr($range, 1);
            } else {
                $range = explode('-', $range);
                $c_start = $range[0];

                $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
            }
            $c_end = ($c_end > $end) ? $end : $c_end;
            if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $start-$end/$size");
                exit;
            }
            $start = $c_start;
            $end = $c_end;
            $length = $end - $start + 1;
            fseek($stream, $start);
            header('HTTP/1.1 206 Partial Content');
            header("Content-Length: " . $length);
            header("Content-Range: bytes $start-$end/" . $size);


            $i = $start;
            set_time_limit(0);
            while (!feof($stream) && $i <= $end) {
                $bytesToRead = $buffer;
                if (($i + $bytesToRead) > $end) {
                    $bytesToRead = $end - $i + 1;
                }
                $data = fread($stream, $bytesToRead);
                echo $data;
                flush();
                $i += $bytesToRead;
            }

            fclose($stream);


        } else {*/


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

}