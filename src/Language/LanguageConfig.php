<?php

namespace Nemundo\Core\Language;


use Nemundo\Core\Base\AbstractBase;

class LanguageConfig extends AbstractBase
{

    /**
     * @var bool
     */
    //public static $multiLanguage = false;

    /**
     * @var string
     */
    public static $defaultLanguageCode = LanguageCode::EN;

    /**
     * @var string
     */
    public static $currentLanguageCode = LanguageCode::EN;


    public static $languageList = [LanguageCode::EN,LanguageCode::DE];


}