<?php


namespace Nemundo\Core\Json;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class JsonText extends AbstractBase
{

    /**
     * @var bool
     */
    public $formatJson = true;

    protected $data;// = [];

    public function addRow($row)
    {
        $this->data[] = $row;
    }


    // brauchts es das
    public function addData($data)
    {
        $this->data = $data;
    }


    public function getJson()
    {


        //(new Debug())->write($this->data);

        $option = null;

        if ($this->formatJson) {
            $option = JSON_PRETTY_PRINT;
        }

        $content = json_encode($this->data, $option);

        return $content;

    }

}