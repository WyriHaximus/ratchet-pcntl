<?php

/**
 * This file is part of Ratchet for CakePHP.
 *
 ** (c) 2012 - 2013 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WyriHaximus\Ratchet\PCNTL\Event\Listener;

use Cake\Event\EventListenerInterface;
use WyriHaximus\Ratchet\PCNTL\Event\SignalEvent;

class StopLoopListener implements EventListenerInterface
{
    /**
     * Return an array with events this listener implements
     *
     * @return array
     */
    public function implementedEvents()
    {
        return [
            SignalEvent::EVENT => 'stop',
        ];
    }

    /**
     * @param SignalEvent $event
     */
    public function stop(SignalEvent $event)
    {
        if (
            !in_array(
                $event->data()['signal'],
                [
                    SIGTERM,
                    SIGINT,
                ]
            )
        ) {
            return;
        }

        $event->getLoop()->stop();
    }
}
