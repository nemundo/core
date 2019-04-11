<?php

namespace Nemundo\Core\Event;


use Nemundo\Core\Base\AbstractBaseClass;

class AbstractEventCollection extends AbstractBaseClass
{

    /**
     * @var AbstractEvent[]
     */
    private $eventList = [];

    public function addEvent(AbstractEvent $event)
    {
        $this->eventList[] = $event;
        return $this;
    }


    public function getEventList()
    {
        return $this->eventList;
    }


    public function run($id)
    {

        foreach ($this->eventList as $event) {
            $event->run($id);
        }

    }


}