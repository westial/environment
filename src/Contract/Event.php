<?php

namespace Environment;


interface Event {

    function __construct($context, $uid = null);

    public function getUid();

    public function handle();
}