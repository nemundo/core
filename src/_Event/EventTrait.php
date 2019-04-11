<?php

namespace Nemundo\Core\Event;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;


// RedirectTrait
trait EventTrait
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var AbstractUrlParameter
     */
    public $redirectParameter;

    /**
     * @var string
     */
    protected $redirectId;

    /**
     * @var AbstractEventCollection
     */
    public $afterSubmitEvent;

    protected function loadEventCollection()
    {
        $this->afterSubmitEvent = new AbstractEventCollection();
    }


    protected function checkRedirect()
    {

        if ($this->redirectSite !== null) {

            $site = clone($this->redirectSite);

            if ($this->redirectParameter !== null) {

                $parameter = clone($this->redirectParameter);
                $parameter->setValue($this->redirectId);
                $site->addParameter($parameter);

            }

            $site->redirect();

        }

    }


}