<?php

namespace App\Game;

use App\Game\Card;

class CardHandBank
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
            $values[] = $take->getNumberValue();
        }
        return $values;
    }

    public function getTotalValue(): int
    {
        $totalValue = 0;
        $ess = 0;

        foreach ($this->hand as $card) {
            $value = $card->getNumberValue();

            if ($card->getNumber() === 'A') {
                $ess += 1;
                $value = 14;
            }

            $totalValue += $value;
        }

        while ($totalValue > 21 && $ess > 0) {
            $totalValue -= 13;
            $ess--;
        }

        return $totalValue;
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
