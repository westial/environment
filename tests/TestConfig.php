<?php

namespace Test\Environment;


use Environment\Config;

class TestConfig extends \PHPUnit_Framework_TestCase
{
    function testSingletonConfig()
    {
        $expected = 1675888;
        $key = "keep_deep";
        Config::Instance()->set($key, $expected);

        $this->assertEquals($expected, $this->otherContext($key));
    }

    private function otherContext($key)
    {
        return Config::Instance()->get($key);
    }
}