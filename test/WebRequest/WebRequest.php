<?php


require __DIR__.'/../config.php';

$url='https://www.zamg.ac.at/fix/wetter/bodenkarte/2020/08/21/BK_BodAna_Sat_2008210000.png';
//$url = 'https://www.zamg.ac.at/fix/wetter/bodenkarte/2020/08/21/BK_BodAna_Sat_20082asdf10000.png';
$filename = (new \Nemundo\Project\Path\TmpPath())->addPath('web_request.png')->getFilename();

//(new \Nemundo\Core\Debug\Debug())->write(get_headers($url));

$responseCode =  (new \Nemundo\Core\WebRequest\WebRequest())->getResponseCode($url);
(new \Nemundo\Core\Debug\Debug())->write($responseCode);

//get_headers($url)




//$html = (new \Nemundo\Core\WebRequest\WebRequest())->getUrl($url);
//(new \Nemundo\Core\Debug\Debug())->write($html);

//(new \Nemundo\Core\WebRequest\WebRequest())->downloadUrl($url,$filename);

