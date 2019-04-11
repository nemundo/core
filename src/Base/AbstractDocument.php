<?php

namespace Nemundo\Core\Base;


//namespace Document

// nach Document???
abstract class AbstractDocument extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    abstract public function saveFile();


    public function render()
    {

    }

}