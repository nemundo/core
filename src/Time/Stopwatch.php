<?php

namespace Nemundo\Core\Time;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;


class Stopwatch extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $logName;

    /**
     * @var float
     */
    private $time;

    function __construct($logName = null)
    {
        $this->logName = $logName;
        $this->time = microtime(true);
    }

    public function stop()
    {

        $time = microtime(true) - $this->time;
        $time = round($time, 3);

        return $time;
    }


    public function stopAndScreenOutput()
    {
        (new Debug())->write($this->logName . ': ' . $this->stop());
    }

}
