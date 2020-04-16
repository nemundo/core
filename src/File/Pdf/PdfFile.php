<?php


namespace Nemundo\Core\File\Pdf;


class PdfFile extends AbstractFile
{

    public function getPdfText() {

        $command = "pdftotext $this->filename -";
        $output = shell_exec($command);

        /*
        if ($output !== null) {
            $update = new TemplateFileUpdate();
            $update->text = $output;
            $update->updateById($this->dataId);
        }*/

        return $output;

    }

}