<?php

namespace Nemundo\Core\Device;


use Nemundo\Core\Base\AbstractBase;

// BroswerInformation
// Nemundo\Core\Sytem
class DeviceInformation extends AbstractBase
{

    public function __construct()
    {

        // Laden der Information

    }

// getBrowserAgent
    public function getAgent()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return $userAgent;
    }


    public function getIpAddress()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        return $ipAddress;
    }


    // getBrowserLanguage
    public function getLanguage()
    {
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $language;
    }


    /*
    public function isMobile()
    {
        $detect = new \Mobile_Detect();
        return $detect->isMobile();
    }

    public function isTablet()
    {
        $detect = new \Mobile_Detect();
        return $detect->isTablet();
    }*/

}