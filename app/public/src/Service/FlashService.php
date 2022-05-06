<?php

namespace Mii\Invoice\Service;

use Mii\Invoice\Model\Flashbag;

class FlashService
{
    private $sessionStorage;

    public function __construct()
    {
        $this->sessionStorage = new SessionStorage;
        $flashFromSession = $this->sessionStorage->get(Flashbag::FLASHBAG);

        if ($flashFromSession === null) {
            $this->sessionStorage->add(Flashbag::FLASHBAG, new Flashbag());
        }
    }

    public function get(): Flashbag
    {
        return clone $this->sessionStorage->get(Flashbag::FLASHBAG);
    }

    public function display(): Flashbag
    {
        $flashes = clone $this->sessionStorage->get(Flashbag::FLASHBAG);

        $this->reset();

        return $flashes;
    }

    public function update(Flashbag $flashbag)
    {
        $this->sessionStorage->add(Flashbag::FLASHBAG, $flashbag);
    }
    
    public function reset()
    {
        $this->sessionStorage->add(Flashbag::FLASHBAG, new Flashbag());
    }
}