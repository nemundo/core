<?phpnamespace Nemundo\Core\WebRequest;use Nemundo\Core\Debug\Debug;use Nemundo\Core\File\File;use Nemundo\Core\Log\LogFile;use Nemundo\Core\Log\LogMessage;use Nemundo\Core\Path\Path;use Nemundo\Core\System\Delay;use Nemundo\Core\Text\Utf8Converter;class CurlWebRequest extends AbstractWebRequest{    /**     * @var string     */    public $referrerUrl;    /**     * @var bool     */    public $sslVerification = true;    /**     * @var Authentication     */    public $authentication;    public $customRequest;    protected $loaded = false;    private $curl;    private $header = [];    public function __construct()    {        $this->authentication = new Authentication();    }    public function __destruct()    {        if ($this->curl !== null) {            curl_close($this->curl);        }    }    public function addHeader($header)    {        $this->header[] = $header;        return $this;    }    public function getUrl($url)    {        $this->load($url);        /*if (sizeof($this->header)) {            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);        }*/        $html = curl_exec($this->curl);        if ($html === false) {            $this->writeError('Curl-Fehler: ' . curl_error($this->curl));        }        if ($this->delayRequest) {            (new Delay())->delay($this->delayInSecond);        }        $response = $this->getResponse();        return $response;    }    public function getUrlRedirect() {        $lastUrl = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);        return $lastUrl;    }    public function postUrl($url, $data)    {        //https://stackoverflow.com/questions/3080146/post-data-to-a-url-in-php        $this->load($url);        if (sizeof($this->header)) {            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);        }        curl_setopt($this->curl, CURLOPT_POST, 1);        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);        curl_setopt($this->curl, CURLOPT_HEADER, 0);        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);        $response = $this->getResponse();        return $response;    }    public function deleteUrl($url)    {        $ch = curl_init($url);        if ($this->authentication->authenticate) {            (new Debug())->write('authentification');            curl_setopt($ch, CURLOPT_USERPWD, $this->authentication->username . ':' . $this->authentication->password);        }        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');        $response = curl_exec($ch);        return $response;    }    private function getResponse()    {        $response = new WebResponse();        $html = curl_exec($this->curl);        if ($html === false) {            $this->writeError('Curl-Fehler: ' . curl_error($this->curl));        }        if (curl_errno($this->curl)) {            (new Debug())->write('ERROR');            $response->errorMessage = curl_error($this->curl);        }        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);        $response->statusCode = $httpCode;        if ($httpCode !== 200) {            $response->errorMessage = curl_error($this->curl);            $html = '';        }        if ($this->utf8Decode) {            $html = (new Utf8Converter())->utf8Encode($html);        }        $response->html = $html;        $response->url = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);        $response->urlRedirect = curl_getinfo($this->curl, CURLINFO_REDIRECT_URL);        return $response;    }    public function downloadUrl($url, $destinationFilename)    {        $response = new WebResponse();        $file = new File($destinationFilename);        (new Path($file->getPath()))->createPath();        $this->load($url);        $fp = fopen($destinationFilename, 'w+');        if ($fp === false) {            $this->writeError('Curl. Could not open: ' . $destinationFilename);        }        curl_setopt($this->curl, CURLOPT_FILE, $fp);        $html = curl_exec($this->curl);        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);        $response->statusCode = $httpCode;        if ($html === false) {            $response->errorMessage = 'Curl Download Fehler: ' . curl_error($this->curl);        }        return $response;    }    protected function load($url)    {        if (!$this->loaded) {            $this->loaded = true;            $this->curl = curl_init();            if (!$this->sslVerification) {                curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);            }            curl_setopt($this->curl, CURLOPT_USERAGENT, $this->userAgent);            if ($this->followRedirect) {                curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);            }            if ($this->customRequest !== null) {                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $this->customRequest);            }            if (sizeof($this->header)) {                curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);            }            // Error: dh key too small            //curl_setopt($this->curl, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT@SECLEVEL=1');// aktiviert 18juli2021            // deaktiviert            curl_setopt($this->curl, CURLOPT_ENCODING, 'gzip');            if ($this->authentication->authenticate) {                curl_setopt($this->curl, CURLOPT_USERPWD, $this->authentication->username . ':' . $this->authentication->password);            }        }        curl_setopt($this->curl, CURLOPT_URL, $url);        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(            'Accept-Language:de-DE,de;q=0.8,en-US;q=0.6,en;q=0.4,it;q=0.2,zh-CN;q=0.2,zh;q=0.2,da;q=0.2,es;q=0.2'        ));        if ($this->referrerUrl !== null) {            curl_setopt($this->curl, CURLOPT_REFERER, $this->referrerUrl);        }        $this->referrerUrl = $url;    }    private function writeError($message)    {        if ($this->throwException) {            (new LogFile())->writeError($message);        } else {            (new LogMessage())->writeError($message);        }    }}