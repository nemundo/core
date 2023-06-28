<?phpnamespace Nemundo\Core\Text;use Nemundo\Core\Base\AbstractBase;class BoldText extends AbstractBase{    /**     * @var string[]     */    public $keywordList = [];    public function addSearchQuery($searchQuery)    {        $keywordList = new WordList($searchQuery);  // new KeywordList();        foreach ($keywordList->getWordList() as $value) {            $this->keywordList[] = $value;        }    }    public function addKeyword($keyword)    {        if ($keyword !== null) {            $keyword = trim($keyword);        }        if ($keyword !== '') {            $this->keywordList[] = $keyword;        }        $this->keywordList = array_unique($this->keywordList);    }    public function getKeywordList()    {        return $this->keywordList;    }    public function getWordIdList()    {        $list = [];        foreach ($this->getKeywordList() as $keyword) {            $list[] = md5(mb_strtolower($keyword));        }        return $list;    }    public function getBoldText($text)    {        foreach ($this->keywordList as $keyword) {            $text = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $text);        }        return $text;    }}