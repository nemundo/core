<?php

namespace Nemundo\Core\Base\LargeReader;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractLargeReader extends AbstractBase
{

    /**
     * @var int
     */
    protected $count = 0;


    /**
     * @var bool
     */
    public $abortMode = false;

    /**
     * @var int
     */
    public $abortLimit = 500;


    abstract public function startData();

    protected function preDataLoading()
    {

    }

    protected function afterDataLoading()
    {

    }


    public function getCount()
    {
        return $this->count;
    }


    protected function checkAbort()
    {

        if ($this->abortMode) {
            if ($this->count == $this->abortLimit) {
                $this->afterDataLoading();
                exit;
                return;
            }
        }

    }

}