<?php

namespace App\Game;

use App\Game\Card;

class CardHandPlayer
{
    private array $hand = [];

    public function addCard(Card $take): void
    {
        $this->hand[] = $take;
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

    public function getTotalValue(): int
    {
        return array_sum($this->getValues());
    }

    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $take) {
            $values[] = $take->getAsString();
        }
        return $values;
    }

    public function getCards(): array
    {
        return $this->hand;
    }
}
