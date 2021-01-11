<?php

namespace Nemundo\Core\WebRequest;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Text\Text;


class WebRequest extends AbstractWebRequest
{

    /**
     * @var string
     */
    public $authorization;

    /**
     * @var bool
     */
    public $showError = false;

    private $loaded = false;

    private $context;

    private $headerList;


    // constructor mit url parameter ???


    public function getUrl($url)
    {

        $this->load();

        if (parse_url($url, PHP_URL_SCHEME) == null) {
            $url = 'http://' . $url;
        }

        $html = @file_get_contents($url, false, $this->context);

        if ($html === false) {
            $errorMessage = 'Http Get Error. Message: ' . error_get_last()['message'];

            if ($this->showError) {
                (new LogMessage())->writeError($errorMessage);
            }

        }

        return $html;

    }


    public function postUrl($url, $data)
    {

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;

    }


    public function downloadUrl($url, $destinationFilename)
    {

        //$file = new File($destinationFilename);


        /*$directory = new Directory();
        $directory->path = $file->path;
        $directory->createDirectory();*/

        $this->load();

        $data = @fopen($url, 'r', false, $this->context);
        if ($data === false) {

            $errorMessage = 'Http Download Error. Message: ' . error_get_last()['message'];

            /*if ($this->throwException) {
                (new LogFile())->writeError($errorMessage);
            } else {
                (new LogMessage())->writeError($errorMessage);
            }*/

            (new LogMessage())->writeError($errorMessage);

            return null;
        }


        $result = @file_put_contents($destinationFilename, fopen($url, 'r', false, $this->context));

        if ($result === false) {
            $errorMessage = 'Http Download Error. Message: ' . error_get_last()['message'];
            (new LogMessage())->writeError($errorMessage);
        }

    }


    private function getHeader($url)
    {

        if ($this->headerList == null) {

            $this->headerList = get_headers($url, 1);

        }

        //$type = get_headers($url, 1)["Content-Type"];

    }


    public function getResponseCode($url)
    {

        $this->getHeader($url);
        //$responseCode = get_headers($url)[0];
        //$responseCode = (int)substr($responseCode, 9, 3);
        $responseCode = (int)substr($this->headerList[0], 9, 3);
        return $responseCode;

    }


    public function getMimeType($url)
    {


        $this->getHeader($url);

        //(new Debug())->write($this->headerList);
//exit;


        $type = '';
        $list = (new Text($this->headerList['Content-Type']))->split('/');

        if (isset($list[1])) {
            $type = $list[1];
        }


        //(new Debug())->write($type);
        //exit;


        //$responseCode = (new Text($this->headerList['Content-Type']))->split('/')[1];
        //return $responseCode;

        return $type;

    }


    private function load()
    {

        if (!$this->loaded) {
            $this->loaded = true;
            $option = array('http' => array('user_agent' => $this->userAgent));

            if ($this->authorization !== null) {

                $option['http']['header'] = 'Authorization:' . $this->authorization;
            }

            $this->context = stream_context_create($option);
        }

    }

}