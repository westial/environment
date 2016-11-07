<?php

namespace Environment;


class Config extends Singleton
{
    protected $settings;

    public function get($setting)
    {
        return $this->settings[$setting];
    }

    public function set($setting, $value)
    {
        return $this->settings[$setting] = $value;
    }
}