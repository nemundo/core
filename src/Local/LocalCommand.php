<?php

namespace Nemundo\Core\Local;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;

class LocalCommand extends AbstractBaseClass
{

    /**
     * @var bool
     */
    public $showOutput = false;


    public function runLocalCommand($command)
    {

        $newCommand = '';

        if (is_array($command)) {
            $newCommand = join(' && ', $command);
        } else {
            $newCommand = $command;
        }

        exec($newCommand, $output);

        if ($this->showOutput) {
            (new Debug())->write($output);
        }

        return $output;

    }


}