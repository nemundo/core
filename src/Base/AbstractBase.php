<?php

namespace Nemundo\Core\Base;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;


abstract class AbstractBase
{

    public function __get($name)
    {
        (new LogMessage())->writeError('Property Access does not exist:' . $name);
    }


    public function __set($name, $value)
    {
        (new LogMessage())->writeError('Property Write does not exist:' . $name);
        (new Debug())->write($value);
    }

}
