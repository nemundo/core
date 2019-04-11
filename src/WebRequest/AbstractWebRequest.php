<?php

namespace Nemundo\Core\WebRequest;

// namespace Nemundo\Web\Http\HttpRequest


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractWebRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $userAgent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';

    /**
     * @var bool
     */
    public $throwException = false;

    /**
     * @var bool
     */
    public $delayRequest = false;

    /**
     * @var int
     */
    public $delayInSecond = 1;

    abstract public function getUrl($url);

    abstract public function postUrl($url, $data);

    // downloadFile
    abstract public function downloadUrl($url, $destinationFilename);


}