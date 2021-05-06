<?php

namespace Nemundo\Core\Local;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;

abstract class AbstractLocalCommand extends AbstractBaseClass
{

    /**
     * @var bool
     */
    protected $showOutput = false;

    private $commandList = [];

    abstract protected function loadCommand();


    protected function addCommand($command)
    {

        $this->commandList[] = $command;
        return $this;

    }


    protected function getCommand() {

    }


    protected function runCommand()
    {

        $this->loadCommand();
        $newCommand = join(' && ', $this->commandList);

        exec($newCommand, $output);


        (new Debug())->write($newCommand);

        if ($this->showOutput) {
            (new Debug())->write($output);
        }

        return $output;

    }

}