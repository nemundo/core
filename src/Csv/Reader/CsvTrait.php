<?phpnamespace Nemundo\Core\Csv\Reader;use Nemundo\Core\File\File;use Nemundo\Core\Log\LogMessage;trait CsvTrait{    /**     * @var string     */    public $filename;    /**     * @var bool     */    public $useFirstRowAsHeader = true;    /**     * @var bool     */    public $utf8Encode = false;    /**     * @var int     */    public $lineOfStart = 0;    protected function checkFileExists()    {        $value = true;        if (!(new File($this->filename))->fileExists()) {            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');            $value = false;        }        return $value;    }}