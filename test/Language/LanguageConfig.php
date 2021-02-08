<?php

require __DIR__ . '/../config.php';

(new \Nemundo\Core\Debug\Debug())->write(\Nemundo\Core\Language\LanguageConfig::$languageList);


foreach (\Nemundo\Core\Language\LanguageConfig::$languageList as $value) {
    (new \Nemundo\Core\Debug\Debug())->write($value);
}
