<?php

namespace Environment;


interface EventNotifier
{
    public function attach(Event $event);

    public function notify();
}