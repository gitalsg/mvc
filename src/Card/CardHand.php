<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    private array $hand = [];

    public function add(Card $take): void
    {
        $this->hand[] = $take;
    }

    public function shuffle(): void
    {
        shuffle($this->hand);
    }

    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    public function getValues(): array
    {
        $values = [];
        foreach ($this->hand as $take) {
            $values[] = $take->getNumber();
        }
        return $values;
    }

    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $take) {
            $values[] = $take->getAsString();
        }
        return $values;
    }
}
