<?php

namespace Nemundo\Core\TextFile\Writer;

use Nemundo\Core\File\Path;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


class TextFileWriter extends AbstractTextFileWriter
{

    /**
     * @var bool
     */
    //public $utf8Encode = false;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var bool
     */
    public $appendToExistingFile = false;

    /**
     * @var string[]
     */
    private $lineList = [];


    public function __destruct()
    {

        // check if file was saved ???
        // TODO: Implement __destruct() method.
    }

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

        if (!$this->overwriteExistingFile && $file->exists()) {
            (new LogMessage())->writeError('File already exists');
            return;
        }

        /*
        if (!file_exists($this->filename)) {
            $file = new File($this->filename);
            (new Path())
                ->addPath($file->getPath())
                ->createDirectory();
        }*/


        (new Path())
            ->addPath($file->getPath())
            ->createDirectory();


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
            (new LogMessage())->writeError('TextFileWriter Error. Filename: '.$this->filename);
        }

    }

}
