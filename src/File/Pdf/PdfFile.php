<?php


namespace Nemundo\Core\File\Pdf;


class PdfFile extends AbstractFile
{

    public function getPdfText()
    {

        $command = "pdftotext -eol unix $this->filename -";
        $text = shell_exec($command);

        if ($text === null) {
            $text = '';
        }

        return $text;

    }

}