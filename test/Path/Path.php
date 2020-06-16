<?php

use Nemundo\App\ModelDesigner\Path\ModelPath;

require __DIR__.'/../config.php';


/*
$filename = (new ModelPath())
    ->addPath( 'bla.json')
    ->getFilename();

(new \Nemundo\Core\Debug\Debug())->write($filename);
*/


$path=new \Nemundo\Core\Path\PathNew('C:\test\test123');
$path->deleteDirectory(true);

//deleteDirectory(true);
//$path->createDirectory();




//new \Nemundo\Core\File\Directory()


/*
foreach ($path->getSubPathList() as $subpath) {


    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}


$path=new \Nemundo\Core\Path\PathNew('C:\test\xcontest\search\2020');
foreach ($path->getSubPathList() as $subpath) {

    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}*/
