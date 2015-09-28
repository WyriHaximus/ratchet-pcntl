<?php

use Cake\Event\EventManager;
use WyriHaximus\Ratchet\PCNTL\Event\Listener\PcntlListener;

EventManager::instance()->on(new PcntlListener());
