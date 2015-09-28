<?php

namespace WyriHaximus\Ratchet\Tests\PCNTL;

class SignalProvider
{
    public function good()
    {
        return [
            [SIGTERM],
            [SIGINT],
        ];
    }

    public function bad()
    {
        return [
            [SIGKILL],
            [SIGALRM],
        ];
    }
}
