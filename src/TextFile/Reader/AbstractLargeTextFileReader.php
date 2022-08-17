<?phpnamespace Nemundo\Core\TextFile\Reader;use Nemundo\Core\Debug\Debug;use Nemundo\Core\File\File;abstract class AbstractLargeTextFileReader extends AbstractTextFileReader{    /**     * @var string     */    protected $filename;    /**     * @var bool     */    protected $utf8Encode = false;    abstract protected function loadTextFile();    abstract protected function onLine($line);    public function startReading()    {        $this->loadTextFile();        if ((new File($this->filename))->fileExists()) {        $file = fopen($this->filename, 'r');        if ($file) {            while (($line = fgets($file)) !== false) {                if ($this->utf8Encode) {                    $line = utf8_encode($line);                }                if ($this->trimLine) {                    $line = trim($line);                }                $this->onLine($line);            }            fclose($file);            $this->onFinished();        }        } else {            (new Debug())->write('File does not exist. Filename: '.$this->filename);        }    }    protected function onFinished() {    }}