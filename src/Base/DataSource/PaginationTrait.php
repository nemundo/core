<?php


namespace Nemundo\Core\Base\DataSource;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Core\Http\Url\Url;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Site\Site;

trait PaginationTrait
{

    /**
     * @var int
     */
    public $paginationLimit = 10;

    /**
     * @var int
     */
    public $currentPage;

    /**
     * @var string
     */
    public $parameterName = 'page';

    /**
     * @var int
     */
    public $count;



    protected function loadPageRequest() {

        $parameter = new GetRequest('page');
        $parameter->defaultValue = 0;
        $this->currentPage = $parameter->getValue();


    }


    protected function getLimitStart()
    {
        $limitStart = ($this->currentPage) * $this->paginationLimit;
        return $limitStart;
    }



    public function getFrom()
    {
        $from = ($this->currentPage * $this->paginationLimit) + 1;
        return $from;
    }


    public function getTo()
    {
        $to = ($this->currentPage+1) * $this->paginationLimit;

        if ($to > $this->getTotalCount()) {
            $to = $this->getTotalCount();
        }

        return $to;
    }


    public function getPaginationCount()
    {
        $paginationCount = ceil($this->getTotalCount() / $this->paginationLimit);
        $paginationCount--;
        return $paginationCount;
    }


    public function getPaginationFrom()
    {
        $from = ($this->currentPage) - 5;
        if ($from < 1) {
            $from = 0;
        }
        return $from;
    }


    public function getPaginationTo()
    {
        $to = $this->currentPage + 5;
        if ($this->currentPage < 5) {
            $to = 10;
        }

        if ($to > $this->getPaginationCount()) {
            $to = $this->getPaginationCount();
        }

        return $to;
    }


    public function getPreviousUrl()
    {

        $parameter = new UrlParameter();

        $parameter->parameterName = 'page';
        $parameter->setValue($this->currentPage-1);

        $url = new Site();  // Url();
        $url->addParameter($parameter);

        return $url->getUrl();

    }


    public function isPreviousActive()
    {

        $value = true;
        if ($this->currentPage == 0) {
            $value = false;
        }
        return $value;

    }


    public function getNextUrl()
    {

        $parameter = new UrlParameter();
        $parameter->parameterName = $this->parameterName;
        $parameter->setValue($this->currentPage+1);

        $url = new \Nemundo\Web\Url\Url();  // new Site(); // new Url();
        $url->addParameter($parameter);

        return $url->getUrl();

    }


    public function isNextActive()
    {

        $value = true;
        if ($this->currentPage == $this->getPaginationCount()) {
            $value = false;
        }

        return $value;

    }

}