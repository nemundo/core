<?phpnamespace Nemundo\Core\Xml\Document;use Nemundo\Core\Base\AbstractBase;abstract class AbstractXmlItem extends AbstractBase{    protected $tagName;    protected $namespace;    protected $value;    /**     * @var AbstractXmlItem[]     */    protected $itemList = [];    /**     *     * @var     */    private $attributeList = [];    abstract protected function loadItem();    function __construct(AbstractXmlItem $parentElement = null)    {        if ($parentElement !== null) {            $parentElement->addItem($this);        }        $this->loadItem();    }    public function addItem($xmlItem)    {        $this->itemList[] = $xmlItem;        return $this;    }    /**     *     * @return AbstractXmlItem[]     */    public function getData()    {        $this->checkProperty('tagName');        return $this->itemList;    }    public function addAttribute($name, $value)    {        // falls Boolean        if (is_bool($value)) {            if ($value) {                $value = 'true';            } else {                $value = 'false';            }        }        $this->attributeList[$name] = $value;        return $this;    }    /**     *     *     */    public function getAttribute($attributeName)    {        $value = '';        if (isset($this->attributeList[$attributeName])) {            $value = $this->attributeList[$attributeName];        }        if ($value == 'false') $value = false;        if ($value == 'true') $value = true;        return $value;    }    public function getAttributeList()    {        return $this->attributeList;    }}