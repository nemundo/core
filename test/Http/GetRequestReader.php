<?php

require '../config.php';

foreach ((new \Nemundo\Core\Http\Request\Get\GetRequestReader())->getData() as $item) {
    (new \Nemundo\Core\Debug\Debug())->write($item->name . ' = ' . $item->value);
}
