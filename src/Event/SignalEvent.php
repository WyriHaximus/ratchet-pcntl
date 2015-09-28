<?php

/**
 * This file is part of Ratchet for CakePHP.
 *
 ** (c) 2015 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WyriHaximus\Ratchet\PCNTL\Event;

use Cake\Event\Event;
use React\EventLoop\LoopInterface;

class SignalEvent extends Event
{
    const EVENT = 'WyriHaximus.Ratchet.PCNTL.SIGTERM';

    /**
     * @param LoopInterface $loop
     * @return static
     */
    public static function create(LoopInterface $loop, $signal)
    {
        return new static(static::EVENT, $loop, [
            'signal' => $signal,
        ]);
    }

    /**
     * @return LoopInterface
     */
    public function getLoop()
    {
        return $this->subject();
    }
}
