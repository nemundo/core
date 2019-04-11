<?php

namespace Nemundo\Core\Log;


class LogConfig
{

    /**
     * @var LogType
     */
    static public $logType = [LogType::SCREEN, LogType::FILE];

    /**
     * @var string
     */
    public static $logPath = 'log';

    /**
     * @var bool
     */
    public static $errorMessageOccurs = false;


}