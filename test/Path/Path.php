<?php

use Nemundo\App\ModelDesigner\Path\ModelPath;

require __DIR__.'/../config.php';


// RandomPath
// DatePath


/*
$filename = (new ModelPath())
    ->addPath( 'bla.json')
    ->getFilename();

(new \Nemundo\Core\Debug\Debug())->write($filename);
*/


$path=new \Nemundo\Core\Path\Path('C:\test\test123');
$path->deleteDirectory();

//deleteDirectory(true);
//$path->createDirectory();




//new \Nemundo\Core\File\Directory()


/*
foreach ($path->getSubPathList() as $subpath) {


    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}


$path=new \Nemundo\Core\Path\Path('C:\test\xcontest\search\2020');
foreach ($path->getSubPathList() as $subpath) {

    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}*/
