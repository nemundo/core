<?phprequire __DIR__ . '/../config.php';//$url = 'https://api.i-web.ch/public/guest/getImageString/g257/e2df0d98b139ed11499d1919323bdab0/1920/560/663253b6ebf79//';$url = 'https://ik.imagekit.io/guidle/tr:h-250,c-at_least,dpr-1/c/c5/e3/cc5e333caa5777086871dca88f05015f89cf56a5_803047968.jpg';$webHeader = new \Nemundo\Core\WebRequest\WebHeader($url);(new \Nemundo\Core\Debug\Debug())->write($webHeader->getHeader());(new \Nemundo\Core\Debug\Debug())->write($webHeader->getContentType());(new \Nemundo\Core\Debug\Debug())->write($webHeader->getResponseCode());(new \Nemundo\Core\Debug\Debug())->write($webHeader->getLocationList());