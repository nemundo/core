<?phpnamespace Nemundo\Core\Json\Document;use Nemundo\Core\Base\AbstractDocument;use Nemundo\Core\Http\Response\HttpResponse;use Nemundo\Core\Http\Response\ResponseType;use Nemundo\Core\Json\Response\JsonResponse;use Nemundo\Core\TextFile\Document\TextFileDocument;use Nemundo\Core\TextFile\Writer\TextFileWriter;abstract class AbstractJsonDocument extends AbstractDocument{    /**     * @var bool     */    public $formatJson = true;    protected $data = [];    public function addRow($row)    {        $this->data[] = $row;    }    // brauchts es das    public function setData($data)    {        $this->data = $data;    }    protected function getContent()    {        $option = null;        if ($this->formatJson) {            $option = JSON_PRETTY_PRINT;        }        $content = json_encode($this->data, $option);        return $content;    }    protected function onWrite($fullFilename)    {     /*   // TODO: Implement onWrite() method.    }    public function writeFile($path)    {*/        //$this->path = $path;        $json = new TextFileWriter($fullFilename);  // new TextFileDocument();  // new TextFileWriter($this->filename);        $json->overwriteExistingFile = $this->overwriteExistingFile;        //$json->createDirectory = true;        $json->addLine($this->getContent());        $json->writeFile();        return $this;    }    protected function onRender()    {        // TODO: Implement onRender() method.        $response = new HttpResponse();        $response->contentType = ResponseType::JSON;        $response->content = $this->getContent();        $response->attachmentFilename=$this->filename;        $response->sendResponse();    }    /*public function render()    {        $response = new HttpResponse();        $response->contentType = ResponseType::JSON;        $response->content = $this->getContent();        $response->attachmentFilename=$this->filename;        $response->sendResponse();        return $this;    }*/}