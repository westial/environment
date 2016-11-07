<?php

namespace Test\Environment;


use Environment\Event;

class DummyCounterEvent implements Event
{
    private $counter;
    private $uid;

    public function __construct($context, $uid = null)
    {
        $this->counter = $context;
        $this->uid = $uid;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function handle()
    {
        $this->counter->value ++;
    }
}