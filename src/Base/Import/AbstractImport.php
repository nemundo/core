<?php

namespace Nemundo\Core\Base\Import;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractImport extends AbstractBase
{

    abstract public function importData();

}