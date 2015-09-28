<?php

namespace WyriHaximus\Ratchet\Tests\PCNTL\Event\Listener;

use Cake\Event\EventManager;
use React\EventLoop\Factory;
use WyriHaximus\Ratchet\Event\WebsocketStartEvent;
use WyriHaximus\Ratchet\PCNTL\Event\Listener\PcntlListener;
use WyriHaximus\Ratchet\PCNTL\Event\SignalEvent;

class PcntlListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementedEvents()
    {
        $this->assertInternalType('array', (new PcntlListener())->implementedEvents());
    }

    /**
     * @dataProvider WyriHaximus\Ratchet\Tests\PCNTL\SignalProvider::good
     */
    public function testSignals($signal)
    {
        $this->body($signal, false, true);
    }

    /**
     * @dataProvider WyriHaximus\Ratchet\Tests\PCNTL\SignalProvider::bad
     */
    public function testIgnoredSignals($signal)
    {
        $this->body($signal, true, false);
    }

    protected function body($signal, $startState, $changeState)
    {
        $callbackFired = $startState;
        $func = function () use (&$callbackFired, $changeState) {
            $callbackFired = $changeState;
        };

        $loop = Factory::create();
        $listener = new PcntlListener();
        $listener->start(WebsocketStartEvent::create($loop));

        EventManager::instance()->on(SignalEvent::EVENT, $func);
        $listener->getPCNTL()->emit($signal, [$signal]);
        EventManager::instance()->off(SignalEvent::EVENT, $func);

        $this->assertTrue($callbackFired);
    }
}
