<?php

namespace Nemundo\Core\Http\Domain;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;

class Domain extends AbstractBaseClass
{

    public function getDomain()
    {

        $domain = 'http';
        if (isset($_SERVER['HTTPS'])) {
            $domain = 'https';
        }
        $domain .= '://';


        if (isset($_SERVER['HTTP_HOST'])) {
            $domain .= $_SERVER['HTTP_HOST'];
        } else {

            /*if (WebConfig::$domain !== null) {
                $domain .= WebConfig::$domain;
            } else {
                (new LogMessage())->writeError('WebConfig::$domain is not defined.');
            }*/

        }


        return $domain;
    }

}