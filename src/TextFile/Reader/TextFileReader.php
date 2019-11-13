<?php

namespace Nemundo\Core\TextFile\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Validation\UrlValidation;


class TextFileReader extends AbstractDataSource
{

    /**
     * @var string
     */
    private $filename;

    /**
     * @var bool
     */
    public $utf8Encode = false;

    /**
     * @var bool
     */
    public $trimLine = true;


    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    protected function loadData()
    {

        //$this->checkProperty('filename');


        // Ist Datei vorhanden
        if (!(new UrlValidation())->isUrl($this->filename)) {

            $file = new File($this->filename);
            if (!$file->fileExists()) {
                (new LogMessage())->writeError('File ' . $this->filename . ' does not exist.');
                return;
            }
        }

        // Datei einlesen
        $file = fopen($this->filename, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {

                // Utf8 Encode
                if ($this->utf8Encode) {
                    $line = utf8_encode($line);
                }

                if ($this->trimLine) {
                    $line = trim($line);
                }

                $this->addItem($line);

                //$this->list[] = $line;

            }
            fclose($file);
        } else {
            (new LogMessage())->writeError('error opening the file.');
        }

    }


    public function getText()
    {

        $text = new TextDirectory();

        foreach ($this->getData() as $line) {
            $text->addValue($line);
        }

        return $text->getTextWithSeperator(PHP_EOL);

    }

}