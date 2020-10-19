<?php


namespace Nemundo\Core\Base\DataSource;


use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Web\Site\Site;

trait PaginationTrait
{

    /**
     * @var int
     */
    public $paginationLimit;

    /**
     * @var int
     */
    public $currentPage;

    /**
     * @var int
     */
    public $count;



    protected function loadPageRequest()
    {

        $this->currentPage = (new PageParameter())->getValue();

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
        $to = ($this->currentPage + 1) * $this->paginationLimit;

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

        $parameter = new PageParameter($this->currentPage - 1);

        $url = new Site();
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

        $parameter = new PageParameter($this->currentPage + 1);

        $url = new \Nemundo\Web\Url\Url();
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