<?phpnamespace Nemundo\Core\Http\Response;abstract class AbstractHttpResponse extends AbstractResponse{    /**     * @var string     */    protected $content;    /**     * @var string     */    protected $contentType = ResponseType::HTML;    /**     * @var string     */    protected $attachmentFilename;    protected $filesize;    public function sendResponse()    {        header('Content-type: ' . $this->contentType . '; charset=utf-8');        if ($this->filesize !== null) {            header('Content-Length: ' . $this->filesize);        }        if ($this->attachmentFilename !== null) {            header('Content-Disposition: attachment; filename="' . $this->attachmentFilename . '"');        }        $this->sendStatusCode();        echo $this->content;    }}