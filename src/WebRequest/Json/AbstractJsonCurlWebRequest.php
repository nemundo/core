<?php

namespace Nemundo\Core\WebRequest\Json;

use Nemundo\Core\WebRequest\Curl\AbstractCurlWebRequest;
use Nemundo\Core\WebRequest\HeaderTrait;

abstract class AbstractJsonCurlWebRequest extends AbstractCurlWebRequest
{

    use HeaderTrait;

    public function __construct()
    {

        parent::__construct();
        $this->loadJson();

    }

}