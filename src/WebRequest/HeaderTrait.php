<?php

namespace Nemundo\Core\WebRequest;

trait HeaderTrait
{

    protected function loadJson()
    {

        $this->loadFormat('json');
        return $this;

        /*$this
            ->addHeader('Accept: application/json')
        ->addHeader('Content-Type: application/json');*/

    }

    protected function loadXml()
    {

        $this->loadFormat('xml');
        return $this;

        /*$this
            ->addHeader('Accept: application/xml')
            ->addHeader('Content-Type: application/xml');*/

        //$request->addHeader('Content-Type: application/xml');


    }


    private function loadFormat($format)
    {

        $this
            ->addHeader('Accept: application/'.$format)
            ->addHeader('Content-Type: application/'.$format);

    }


}