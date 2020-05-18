<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;


// BoldText
class TextBold extends AbstractBase
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


    public function addSearchQuery($searchQuery)
    {

        $keywordList = new WordList($searchQuery);  // new KeywordList();
        foreach ($keywordList->getWordList() as $value) {
            $this->keywordList[] =$value;
        }


        // unique

    }


    public function getKeywordList() {
        return $this->keywordList;
    }


    public function getWordIdList() {

        $list=[];
foreach ($this->getKeywordList() as $keyword) {
        $list[]=md5(mb_strtolower( $keyword));
}
        return $list;

    }

    public function getBoldText($text)
    {

        foreach ($this->keywordList as $keyword) {
            $text = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $text);
        }

        return $text;

    }

}