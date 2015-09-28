<?php

namespace WyriHaximus\Ratchet\PCNTL\Event;

use Phake;
use React\EventLoop\Factory;
//use WyriHaximus\Ratchet\Tests\Event\AbstractEventTest;

//class SignalEventTest extends AbstractEventTest
class SignalEventTest extends \PHPUnit_Framework_TestCase
{
    const FQCN = 'WyriHaximus\Ratchet\PCNTL\Event\SignalEvent';

    public function testCreate()
    {
        $loop = Factory::create();
        $signal = SIGTERM;
        $event = SignalEvent::create($loop, $signal);
        $this->assertSame($loop, $event->getLoop());
        $this->assertSame([
            'signal' => $signal,
        ], $event->data());
    }
}
