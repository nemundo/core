<?php

namespace Nemundo\Core\Event;


use Nemundo\Core\Base\AbstractBaseClass;


abstract class AbstractEvent extends AbstractBaseClass
{

    abstract public function run($id);


}