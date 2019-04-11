<?php

namespace Nemundo\Core\Console;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Validation\ValidationType;

class ConsoleInput extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var bool
     */
    public $validation = true;

    /**
     * @var ValidationType
     */
    public $validationType = ValidationType::IS_VALUE;


    public function getValue()
    {

        $message = $this->message;

        if ($this->defaultValue !== null) {
            $message .= ' [' . $this->defaultValue . ']';
        }

        $message .= ' : ';

        //do {
        $line = readline($message);
        //} while ($line == null);

        if ($line == null) {
            $line = $this->defaultValue;
        }

        return $line;

    }


}