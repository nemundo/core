<?php

namespace Nemundo\Core\TextFile\Writer;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;


class TextFileWriter extends AbstractTextFileWriter
{

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var bool
     */
    public $appendToExistingFile = false;

    public $createDirectory = false;

    /**
     * @var string[]
     */
    private $lineList = [];


    public function addLine($line)
    {

        if (is_array($line)) {
            $this->lineList = array_merge($this->lineList, $line);
        } else {
            $this->lineList[] = $line;
        }

        return $this;

    }


    public function saveFile()
    {

        $file = new File($this->filename);

        if (!$this->overwriteExistingFile && $file->fileExists()) {
            if (!$this->appendToExistingFile) {
                (new LogMessage())->writeError('File already exists. Filename: ' . $this->filename);
                return;
            }
        }

        if ($this->createDirectory) {

            (new Path($file->getPath()))
                ->createPath();

        }


        $content = implode(PHP_EOL, $this->lineList);

        $mode = 'w';
        if (!file_exists($this->filename)) {
            $mode = 'w';
        }

        if ($this->overwriteExistingFile) {
            $mode = 'w';
        }

        if ($this->appendToExistingFile) {

            $mode = 'a';
            $content = PHP_EOL . $content;
        }

        $file = fopen($this->filename, $mode);


        if ($file !== false) {
            fwrite($file, $content);
            fclose($file);
        } else {
            (new LogMessage())->writeError('TextFileWriter Error. Filename: ' . $this->filename);
        }

    }

}
