<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBaseClass;

// WordList
class KeywordList extends AbstractBaseClass
{

    /**
     * @var bool
     */
    public $lowerCase = true;

    /**
     * @var bool
     */
    //public $uniqueList = true;

    /**
     * @var bool
     */
    public $hashAsId = false;

    /**
     * @var bool
     */
    public $addInputText = true;


    public function getHashList($text) {

        $list = $this->getKeywordList($text);

        $md5List=[];
        foreach ($list as $word) {
            $md5List[]= md5(mb_strtolower($word));
        }

        return $md5List;



    }


    public function getKeywordList($text)
    {


        // '

        $text = trim($text);
        $keywordList = preg_split('~[^\p{L}\p{N}\']+~u', $text);

        if ($this->addInputText) {
            $keywordList[] = $text;
        }

        $keywordList = array_unique($keywordList);

        /*
        if ($this->lowerCase) {
            $keywordList = array_map('strtolower', $keywordList);
        }*/

        $valueList = [];
        foreach ($keywordList as $keyword) {

            $keyword = trim($keyword);

            if ($keyword !== '') {

                if ($this->lowerCase) {
                    $keyword = mb_strtolower($keyword);
                }

                if ($this->hashAsId) {
                    $id = md5(mb_strtolower($keyword));
                    $valueList[$id] = $keyword;
                } else {
                    $valueList[] = $keyword;
                }

            }

        }

        return $valueList;

    }

}