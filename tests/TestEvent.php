<?php

namespace Test\Environment;


use Environment\Notifier;

class TestEvent extends \PHPUnit_Framework_TestCase
{

    function testEventManagerDifferentEvents()
    {
        $this->runEventManager(100, function (){ return uniqid(); });
    }

    function testEventManagerOverridingEvents()
    {
        $this->runEventManager(1, function (){ return self::repeatUid(); });
    }

    private function runEventManager($expected, $uidGenerator)
    {
        $counter = new \stdClass();
        $counter->value = 0;
        for ($i = 0; $i < $expected; $i ++)
        {
            $eventUid = $uidGenerator();
            Notifier::Instance()->attach(
                new DummyCounterEvent($counter, $eventUid)
            );
        }
        $this->assertEmpty($counter->value);
        Notifier::Instance()->notify();
        $this->assertEquals($expected, $counter->value);
    }

    static function repeatUid()
    {
        return "uid-123";
    }
}