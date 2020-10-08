<?php

namespace Nemundo\Core\Device;


use Nemundo\Core\Base\AbstractBase;

// nach System
class DeviceInformation extends AbstractBase
{

    public function getBrowserAgent()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return $userAgent;
    }


    public function getIpAddress()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        return $ipAddress;
    }


    public function getBrowserLanguage()
    {
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $language;
    }


    public function getUrlReferer()
    {

        $urlReferer = '';
        if (isset($_SERVER['HTTP_REFERER'])) {
            $urlReferer = $_SERVER['HTTP_REFERER'];
        }
        return $urlReferer;

    }


}