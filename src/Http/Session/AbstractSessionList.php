<?php


namespace Nemundo\Core\Http\Session;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;

// AbstractCookieList

abstract class AbstractSessionList extends AbstractSession
{



    public function addValue($value) {


        $list = $this->getValueList();
        $list[]=$value;

        $this->setValue(json_encode($list));
        return $this;

        //$content = json_encode($this->data);

        //new JsonDocument()



    }


    public function getValueList() {

        $list=[];
        $value = $this->getValue();

        //(new Debug())->write($value);
        //exit;

        if ($value!==null) {
        $list = json_decode( $this->getValue());
        }
        return $list;

    }


    public function clearList() {

        $list=[];
        $this->setValue(json_encode($list));
        return $this;

    }


}