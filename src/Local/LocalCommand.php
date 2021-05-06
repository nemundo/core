<?php

namespace Nemundo\Core\Local;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;

class LocalCommand extends AbstractLocalCommand   // AbstractBaseClass
{

    /**
     * @var bool
     */
    public $showOutput = false;


    protected function loadCommand()
    {
        // TODO: Implement loadCommand() method.
    }


    public function runLocalCommand($command)
    {

        $this->addCommand($command);
        $output=$this->runCommand();


        /*
        $newCommand = '';

        if (is_array($command)) {
            $newCommand = join(' && ', $command);
        } else {
            $newCommand = $command;
        }

        exec($newCommand, $output);

        if ($this->showOutput) {
            (new Debug())->write($output);
        }*/

        return $output;

    }


}