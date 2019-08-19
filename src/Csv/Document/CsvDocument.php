<?php

namespace Nemundo\Core\Csv\Document;


use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\File\Directory;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;


class CsvDocument extends AbstractDocument
{

    /**
     * @var string
     */
    public $separator = ';';

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var bool
     */
    public $convertExcel = false;

    private $rowList = [];


    /**
     * @param $row array
     */
    public function addRow($row)
    {

        // Windows Codierung
        if ($this->convertExcel) {
            $dataNew = array();
            foreach ($row as $line) {
                $dataNew[] = $this->convertToWindowsCharset($line);
            }

            $this->rowList[] = $dataNew;
        } else {
            $this->rowList[] = $row;
        }


    }


    /**
     * Excel erwartet Windows Codierung
     * http://blog.next-motion.de/2010/07/17/umlaute-in-csv-export-per-php-zeichensatzkonvertierung/
     * @param $string
     * @return string
     */
    private function convertToWindowsCharset($string)
    {
        $charset = mb_detect_encoding(
            $string,
            "UTF-8, ISO-8859-1, ISO-8859-15",
            true
        );

        $string = mb_convert_encoding($string, "Windows-1252", $charset);
        return $string;
    }


    public function saveFile()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }

        $directory = new Directory();
        $directory->path = (new File($this->filename))->getPath();
        $directory->createDirectory();

        $this->saveFileInternal($this->filename);

    }


    public function render()
    {

        if ($this->filename == null) {
            $this->filename = 'document.csv';
        }

        $response = new HttpResponse();
        $response->contentType = ContentType::CSV;
        $response->attachmentFilename = basename($this->filename);
        $response->sendResponse();

        $this->saveFileInternal('php://output');

    }


    private function saveFileInternal($filename)
    {

        $file = @fopen($filename, 'w');

        if (!$file) {
            (new LogMessage())->writeError('Csv File could not be open. Filename: ' . $filename);
            return;
        }

        foreach ($this->rowList as $row) {
            fputcsv($file, $row, $this->separator);
        }

        fclose($file);

    }

}
