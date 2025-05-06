<?php

namespace App\Game;

use App\Game\Card;

class CardHandPlayer
{
    /**
     * @var Card[]
     */
    private array $hand = [];

    public function addCard(Card $take): void
    {
        $this->hand[] = $take;
    }

    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    /**
     * @return int[]
     */
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

    /**
     * @return string[]
     */
    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $take) {
            $values[] = $take->getAsString();
        }
        return $values;
    }

    /**
     * @return Card[]
     */
    public function getCards(): array
    {
        return $this->hand;
    }
}
