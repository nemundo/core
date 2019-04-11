<?php

namespace Nemundo\Core\Language;


use Nemundo\Core\Base\AbstractBase;

class LanguageConfig extends AbstractBase
{

    /**
     * @var bool
     */
    public static $multiLanguage = false;

    /**
     * @var string
     */
    public static $defaultLanguageCode;

    /**
     * @var string
     */
    public static $currentLanguageCode;


    public static $languageList = array();


}