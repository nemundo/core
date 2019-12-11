<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;


// PhpConfig
class PhpEnvironment extends AbstractBase
{

    public function getPhpVersion()
    {
        $version = phpversion();
        return $version;
    }


    public function getMemoryLimit()
    {
        $limit = ini_get('memory_limit');
        return $limit;
    }

    public function setMemoryLimit($memory)
    {

        ini_set('memory_limit', $memory . 'M');
        return $this;

    }


    public static function getPhpExtension()
    {

    }


    public function getPhpIniFilename()
    {
        return php_ini_loaded_file();
    }


    public function getMaxFileUpload()
    {
        $maxFileUpload = ini_get('max_file_uploads');
        return $maxFileUpload;
    }

    public function getMaxFileUploadSize()
    {
        $maxFileUpload = ini_get('upload_max_filesize');
        return $maxFileUpload;
    }


    public function getMaxPostSize()
    {
        //$maxFileUpload = ini_get('post_max_size');
        //return $maxFileUpload;

        $value = $this->getValue('post_max_size');
        return $value;

    }


    private function getValue($parameter) {
        $value = ini_get($parameter);
        return $value;
    }

}