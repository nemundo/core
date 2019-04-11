<?php

require '../../../../../config.php';


if ((new \Nemundo\Core\Validation\NumberValidation())->isNumber('99')) {
    (new \Nemundo\Core\Debug\Debug())->write('is a number');
} else {
    (new \Nemundo\Core\Debug\Debug())->write('is not a number');
}

