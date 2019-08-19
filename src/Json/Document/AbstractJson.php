<?php

namespace Nemundo\Core\Json\Document;


use Nemundo\Core\Base\AbstractBase;

class AbstractJson extends AbstractBase
{

    protected $data = array();

    public function addRow($row)
    {
        $this->data[] = $row;
    }


    public function addData($data) {
        $this->data = $data;
    }


    protected function getContent()
    {
        $content = json_encode($this->data, JSON_PRETTY_PRINT);
        return $content;
    }

}