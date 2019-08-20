<?php

namespace Nemundo\Core\Text;


class BoldText
{

    // multi Keyword

    /**
     * @var string
     */
    public $keyword;


    public $keywordList=[];


    public function addKeyword($keyword) {

    }


    public function getBoldText($text) {

        $text = preg_replace('/(' . $this->keyword . ')/i', '<b>$1</b>', $text);
        return $text;

    }

}