<?php

namespace Nemundo\Core\Json\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
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

        $this->list = json_decode($this->text, true);

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