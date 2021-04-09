<?php

namespace Nemundo\Core\Base;


//namespace Document

// nach Document???
abstract class AbstractDocument extends AbstractBaseClass
{


    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var bool
     */
    public $appendToExistingFile = false;

    public $createDirectory = false;

    /**
     * @var string
     */
    //*public $filename;


    /**
     * @var string
     */
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }



    // writeFile
    abstract public function saveFile();


    public function render()
    {

    }

}