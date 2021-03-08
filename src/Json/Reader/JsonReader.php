<?php

namespace Nemundo\Core\Json\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Text\ByteOrderMarkText;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\WebRequest\WebRequest;


class JsonReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $filter;

    /**
     * @var string
     */
    private $text;


    public function fromFilename($filename)
    {

        $file = new TextFileReader($filename);
        $this->text = $file->getText();

        return $this;

    }


    public function fromUrl($url)
    {

        $webRequest = new WebRequest();
        $this->text = $webRequest->getUrl($url);
        return $this;

    }


    // fromContent
    public function fromText($text)
    {
        $this->text = $text;
        return $this;
    }


    protected function loadData()
    {

        $text = (new ByteOrderMarkText())->removeByteOrderMark($this->text);
        $this->list = json_decode($text, true);

        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                //echo ' - Keine Fehler';
                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximale Stacktiefe überschritten';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Unterlauf oder Nichtübereinstimmung der Modi';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unerwartetes Steuerzeichen gefunden';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntaxfehler, ungültiges JSON';
                break;
            case JSON_ERROR_UTF8:
                echo ' - Missgestaltete UTF-8 Zeichen, möglicherweise fehlerhaft kodiert';
                break;
            default:
                echo ' - Unbekannter Fehler';
                break;
        }





        if ($this->filter !== null) {
            if (isset($this->list[$this->filter])) {
                $this->list = $this->list[$this->filter];
            } else {
                (new LogMessage())->writeError('Filter "' . $this->filter . '"" not found');
                $this->list = [];
            }
        }

    }

}