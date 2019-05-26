<?php

namespace Nemundo\Core\WebRequest;


use Nemundo\Core\File\Directory;
use Nemundo\Core\Log\LogFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\System\Delay;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\ProjectConfig;


class WebRequestCurl extends AbstractWebRequest
{

    /**
     * @var bool
     */
    public $proxy = false;

    /**
     * @var string
     */
    public $proxyHost;

    /**
     * @var string
     */
    public $proxyPort;

    /**
     * @var string
     */
    public $proxyUser;

    /**
     * @var string
     */
    public $proxyPassword;


    /**
     * @var string
     */
    public $referrerUrl;

    private $loaded = false;

    private $curl;

    private $header = [];

    public function __destruct()
    {
        if ($this->curl !== null) {
            curl_close($this->curl);
        }
    }


    public function addHeader($header)
    {

        //$this->header = $header;

        $this->header[] = $header;

        //curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);

        return $this;

    }


    public function getUrl($url)
    {

        $this->load($url);

        if (sizeof($this->header)) {
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);
        }

        $html = curl_exec($this->curl);
        if ($html === false) {
            $this->writeError('Curl-Fehler: ' . curl_error($this->curl));
        }

        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            $this->writeError('Curl. Http Code: ' . $httpCode . ' Url: ' . $url);
            $html = '';
        }

        if ($this->delayRequest) {
            (new Delay())->delay($this->delayInSecond);
        }

        return $html;

    }


    public function getRedirectedUrl()
    {

        $info = curl_getinfo($this->curl);
        $url = $info['url'];

        return $url;

    }


    public function postUrl($url, $data)
    {
        //https://stackoverflow.com/questions/3080146/post-data-to-a-url-in-php
    }


    public function downloadUrl($url, $destinationFilename)
    {

        $file = new File($destinationFilename);

        $directory = new Directory();
        $directory->path = $file->getPath();
        $directory->createDirectory();

        $this->load($url);

        $fp = fopen($destinationFilename, 'w+');
        if ($fp === false) {
            $this->writeError('Curl. Could not open: ' . $destinationFilename);
        }

        curl_setopt($this->curl, CURLOPT_FILE, $fp);

        //curl_setopt($this->curl, CURLOPT_HEADER, 1); // return HTTP headers with response
        //curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1); // return the response rather than output it

        $response = curl_exec($this->curl);


        if ($response === false) {
            //(new LogMessage())->writeError();

            $this->writeError('Curl Download Fehler: ' . curl_error($this->curl));

        }


        //(new Debug())->write($response);  //curl_getinfo($this->curl));
        //exit;

        //$new_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        //$realUrl = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);

        //(new Debug())->write($realUrl);

        //(new Debug())->write($response);

    }


    private function load($url)
    {

        if (!$this->loaded) {

            $this->loaded = true;

            $this->curl = curl_init();

            //curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($this->curl, CURLOPT_USERAGENT, $this->userAgent);
            curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);


            if ($this->proxy) {

                $proxyUrl = $this->proxyHost . ':' . $this->proxyPort;
                curl_setopt($this->curl, CURLOPT_PROXY, $proxyUrl);

                $proxyLogin = $this->proxyUser . ':' . $this->proxyPassword;
                curl_setopt($this->curl, CURLOPT_PROXYUSERPWD, $proxyLogin);

            }

            curl_setopt($this->curl, CURLOPT_COOKIEJAR, ProjectConfig::$tmpPath . 'my_cookies.txt');
            curl_setopt($this->curl, CURLOPT_COOKIEFILE, ProjectConfig::$tmpPath . 'my_cookies.txt');

        }

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            'Accept-Language:de-DE,de;q=0.8,en-US;q=0.6,en;q=0.4,it;q=0.2,zh-CN;q=0.2,zh;q=0.2,da;q=0.2,es;q=0.2'
        ));

        if ($this->referrerUrl !== null) {
            curl_setopt($this->curl, CURLOPT_REFERER, $this->referrerUrl);
        }

        $this->referrerUrl = $url;

    }


    private function writeError($message)
    {


        if ($this->throwException) {
            (new LogFile())->writeError($message);
        } else {
            (new LogMessage())->writeError($message);
        }

    }

}