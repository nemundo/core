<?php

require '../config.php';


foreach ((new \Nemundo\Core\Http\Request\Get\GetRequestReader())->getData() as $name=>$value) {
    (new \Nemundo\Core\Debug\Debug())->write("$name = $value");

}
