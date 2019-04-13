<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


class TextFile extends AbstractDocument
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $content = '';

    /**
     * @var bool
     */
    public $utf8Encode = false;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var bool
     */
    public $appendToExistingFile = false;


    private $file;

    //private $lineCount = 0;

    private $isOpen = false;


    public function __destruct()
    {
        $this->closeFile();
    }


    public function addLine($line)
    {


        /*$this->content = $this->content . $line . PHP_EOL;
        $this->lineCount++;

        if ($this->lineCount > 10000) {

            $this->openFile();
            //fwrite($this->file, $line);

            fwrite($this->file, $this->content);
            $this->content = '';

        }*/

        $this->openFile();
        //fwrite($this->file, $line . PHP_EOL);


        if (is_array($line)) {
            //$this->content = implode(PHP_EOL, $text);

            foreach ($line as $value) {
                $this->addLine($value);
            }

        } else {
            //$this->content = $this->content . $text . PHP_EOL;
            fwrite($this->file, $line . PHP_EOL);
        }

        /*
        $this->lineCount++;

        if ($this->lineCount > 1000) {


        }*/


        return $this;

    }


    private function openFile()
    {

        if (!$this->isOpen) {

            if (!$this->checkProperty('filename')) {
                (new LogFile())->writeError('Class TextFile. No filename defined');
            }


            if (!file_exists($this->filename)) {

                $file = new File($this->filename);
                (new Path())
                    ->addPath($file->getPath())
                    ->createDirectory();

            }


            if ($this->overwriteExistingFile) {
                //if (file_exists($this->filename)) {

                /*$file = new File($this->filename);
                (new Path())
                    ->addPath($file->getPath())
                    ->createDirectory();*/


                $fileHandle = fopen($this->filename, 'w');
                //fwrite($file, $line);
                fclose($fileHandle);
                //}
            }


            $mode = 'a';
            if (!file_exists($this->filename)) {
                $mode = 'w';
            }

            $this->file = fopen($this->filename, $mode);
            $this->isOpen = true;

        }

    }


    public function closeFile()
    {
        if ($this->isOpen) {
            fclose($this->file);
            $this->isOpen = false;
        }
    }


    /*
    public function appendLine($line)
    {

        $file = fopen($this->filename, 'a');
        fwrite($file, $line);
        fclose($file);

        return $this;

    }*/


    private function writeFileIntern($filename)
    {

        $content = $this->content;

        if (is_array($this->content)) {
            $content = implode(PHP_EOL, $this->content);
        }

        $mode = 'w';

        if ($this->appendToExistingFile) {
            $mode = 'a';
        }

        $file = fopen($filename, $mode);
        fwrite($file, $content);
        fclose($file);


    }


    public function saveFile()
    {

    }

    /*
    public function saveFile()
    {

        (new LogFile())->writeError('Function saveFile');

        (new Debug())->write('saveFile');
        exit;


        if (!$this->checkProperty('filename')) {
            return;
        }

        $dir = new Directory();
        $dir->path = dirname($this->filename);
        $dir->createDirectory();

        if ((!$this->overwriteExistingFile) && (!$this->appendToExistingFile)) {
            if (file_exists($this->filename)) {
                (new LogMessage())->writeError('File ' . $this->filename . ' already exists.');
                return;
            }
        }

        $this->writeFileIntern($this->filename);

    }*/


    function render()
    {

        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename=' . basename($this->filename));

        $this->writeFileIntern('php://output');

    }

}
