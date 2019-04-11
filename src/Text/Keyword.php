<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBaseClass;

// namespace Utility


class Keyword extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $text;

    public function getKeywordList($text)
    {

        $text = trim($text);
        $keywordList = preg_split('~[^\p{L}\p{N}\']+~u', $text);
        $keywordList = array_unique($keywordList);
        $keywordList = array_map('strtolower', $keywordList);

        return $keywordList;

    }

}