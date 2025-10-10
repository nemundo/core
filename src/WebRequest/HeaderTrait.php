<?php

namespace Nemundo\Core\WebRequest;

trait HeaderTrait
{

    protected function loadJson()
    {

        $this->loadFormat('json');
        return $this;

    }

    protected function loadXml()
    {

        $this->loadFormat('xml');
        return $this;

    }


    private function loadFormat($format)
    {

        $this
            ->addHeader('Accept: application/'.$format)
            ->addHeader('Content-Type: application/'.$format);

    }


}