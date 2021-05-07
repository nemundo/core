<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;


// Byte Order Mark (BOM
class ByteOrderMarkText extends AbstractBase
{

    public function removeByteOrderMark($text) {

        (new Debug())->write($text);

            if(substr($text,0,3)==chr(hexdec('EF')).chr(hexdec('BB')).chr(hexdec('BF'))){
                return substr($text,3);
            }else{
                return $text;
            }
        }


}