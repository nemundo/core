<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Debug\Debug;

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

        //(new Debug())->write($this->keywordList);

        foreach ($this->keywordList as $keyword) {
            //(new Debug())->write($keyword);
            $text = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $text);
        }

        return $text;

    }

}