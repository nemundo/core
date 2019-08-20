<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBaseClass;


// KeywordList
class Keyword extends AbstractBaseClass
{

    /**
     * @var string
     */
    //public $text;

    public $lowerCase = true;


    public $addText=true;

    public function getKeywordList($text)
    {

        $text = trim($text);
        $keywordList = preg_split('~[^\p{L}\p{N}\']+~u', $text);

        if ($this->addText) {
            $keywordList[]=$text;
        }

        $keywordList = array_unique($keywordList);

       if ( $this->lowerCase) {
         $keywordList = array_map('strtolower', $keywordList);
       }

        return $keywordList;

    }

}