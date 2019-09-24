<?php

require __DIR__.'/../config.php';


$keywordList=[];
$keywordList[]= 'zrh';
$keywordList[]='switzerland';


$boldText = new \Nemundo\Core\Text\TextBold();
$boldText->keywordList=$keywordList;
//$boldText->keyword = 'zrh';
$output = $boldText->getBoldText('Airport ZRH LSZH Switzerland');

(new \Nemundo\Core\Debug\Debug())->write($output);
