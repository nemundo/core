<?php


namespace Nemundo\Core\File\Pdf;


use Nemundo\Core\Debug\Debug;

class PdfFile extends AbstractFile
{

    public function getPdfText()
    {

        $command = "pdftotext $this->filename -";
        $text = shell_exec($command);

        if ($text === null) {
            $text = '';
        }
        (new Debug())->write($text);
        exit;
        return $text;

    }

}