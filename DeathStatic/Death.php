<?php

class Death
{
    private array $reason;

    public function __construct(array $reason)
    {
        $this->reason = $reason;
    }

    public function getReason(): array
    {
        return $this->reason;
    }
}