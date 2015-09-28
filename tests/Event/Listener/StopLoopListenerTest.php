<?php

namespace WyriHaximus\Ratchet\Tests\PCNTL\Event\Listener;

use Phake;
use WyriHaximus\Ratchet\PCNTL\Event\Listener\StopLoopListener;
use WyriHaximus\Ratchet\PCNTL\Event\SignalEvent;

class StopLoopListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementedEvents()
    {
        $this->assertInternalType('array', (new StopLoopListener())->implementedEvents());
    }

    /**
     * @dataProvider WyriHaximus\Ratchet\Tests\PCNTL\SignalProvider::good
     */
    public function testStop($signal)
    {
        $loop = Phake::mock('React\EventLoop\LoopInterface');
        (new StopLoopListener())->stop(SignalEvent::create($loop, $signal));
        Phake::verify($loop)->stop();
    }

    /**
     * @dataProvider WyriHaximus\Ratchet\Tests\PCNTL\SignalProvider::bad
     */
    public function testStopWrongSignal($signal)
    {
        $loop = Phake::mock('React\EventLoop\LoopInterface');
        (new StopLoopListener())->stop(SignalEvent::create($loop, $signal));
        Phake::verifyNoInteraction($loop);
    }
}
