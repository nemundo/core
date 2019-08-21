<?php

require __DIR__.'/../config.php';

$text = 'Airport ZRH, LSZH Switzerland?';
$keywordList = new \Nemundo\Core\Text\KeywordList();
$keywordList->lowerCase=true;
$keywordList->addInputText = false;
$keywordList->hashAsId=true;

(new \Nemundo\Core\Debug\Debug())->write($keywordList->getKeywordList($text));
