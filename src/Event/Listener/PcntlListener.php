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
use Cake\Event\EventManager;
use MKraemer\ReactPCNTL\PCNTL;
use WyriHaximus\Ratchet\Event\WebsocketStartEvent;
use WyriHaximus\Ratchet\PCNTL\Event\SignalEvent;

class PcntlListener implements EventListenerInterface
{
    /**
     * @var array
     */
    protected $signals = [
        SIGTERM,
        SIGINT,
    ];

    /**
     * @var PCNTL
     */
    protected $pcntl;

    /**
     * Return an array with events this listener implements
     *
     * @return array
     */
    public function implementedEvents()
    {
        return [
            WebsocketStartEvent::EVENT => 'start',
        ];
    }

    /**
     * @param WebsocketStartEvent $event
     */
    public function start(WebsocketStartEvent $event)
    {
        $this->pcntl = new PCNTL($event->getLoop());
        foreach ($this->signals as $signal) {
            $this->pcntl->on($signal, function ($signal) use ($event) {
                EventManager::instance()->dispatch(SignalEvent::create($event->getLoop(), $signal));
            });
        }
    }

    /**
     * @return PCNTL
     */
    public function getPCNTL()
    {
        return $this->pcntl;
    }
}
