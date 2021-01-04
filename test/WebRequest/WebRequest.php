<?php


require __DIR__.'/../config.php';

//$url='https://www.zamg.ac.at/fix/wetter/bodenkarte/2020/08/21/BK_BodAna_Sat_2008210000.png';
//$url = 'https://www.zamg.ac.at/fix/wetter/bodenkarte/2020/08/21/BK_BodAna_Sat_20082asdf10000.png';


//$url = 'https://th.bing.com/th/id/OIP.PL5VicpCLu3UIQV9JDM6gAHaE6?pid=Api&rs=1';
$url = 'https://pbs.twimg.com/media/Equdn14XEAACTUB?format=jpg&name=large';

$filename = (new \Nemundo\Project\Path\TmpPath())->addPath('web_request.apng')->getFilename();
$responseCode =  (new \Nemundo\Core\WebRequest\WebRequest())->getResponseCode($url);
(new \Nemundo\Core\Debug\Debug())->write($responseCode);

(new \Nemundo\Core\WebRequest\WebRequest())->downloadUrl($url,$filename);


//$image = new Nemundo\Core\Image\ImageFile($filename);
//(new \Nemundo\Core\Debug\Debug())->write(  $image->getFileExtension());

$img = new \Nemundo\Core\Image\ImageFile($filename);
(new \Nemundo\Core\Debug\Debug())->write('Image Type: '.$img->imageType);
(new \Nemundo\Core\Debug\Debug())->write('Width: '.$img->width);
(new \Nemundo\Core\Debug\Debug())->write('Height: '.$img->height);



