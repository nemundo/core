<?php

namespace Nemundo\Core\Text;


class BoldText
{

    // multi Keyword

    /**
     * @var string
     */
    //public $keyword;


    /**
     * @var string[]
     */
    public $keywordList = [];


    public function addKeyword($keyword)
    {
        $this->keywordList[] = $keyword;
    }


    public function getBoldText($text)
    {

        foreach ($this->keywordList as $keyword) {
            $text = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $text);
        }

        return $text;

    }

}