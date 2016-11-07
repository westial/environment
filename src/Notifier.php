<?php

namespace Environment;


class Notifier extends Singleton implements EventNotifier
{
    /** @var  array */
    private $events = array();

    public function attach(Event $event)
    {
        $this->events[$event->getUid()] = $event;
    }

    public function notify()
    {
        if (empty($this->events))
        {
            return false;
        }

        /** @var Event $event */
        $event = array_shift($this->events);
        $event->handle();

        return $this->notify();
    }
}