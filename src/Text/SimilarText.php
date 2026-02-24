<?php

namespace Nemundo\Core\Text;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\Number;

class SimilarText extends AbstractBase
{

    public function getSimilarity($text1, $text2)
    {

        $percent = 0;

        if (($text1 !== null) && ($text2 !== null)) {
            similar_text($text1, $text2, $percent);
            $percent = (new Number($percent))->getRoundedNumber(0);
        }

        return $percent;

    }

}