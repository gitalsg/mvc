<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    private array $deck = [];

    public function __construct()
    {
        $color = ['Hearts', 'Spades', 'Diamonds', 'Clubs'];
        $number = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($color as $suit) {
            foreach ($number as $rank) {
                $this->deck[] = new CardGraphic($suit, $rank);
            }
        }
    }

    public function shuffle(): void
    {
        shuffle($this->deck);
    }

    public function all(): array
    {
        return $this->deck;
    }

    public function takeCard(): ?Card
    {
        return array_pop($this->deck);
    }

    public function getRemainingDeck(): int
    {
        return count($this->deck);
    }

    public function getAsString(): array
    {
        $result = [];
            foreach ($this->deck as $card) {
                $result[] = $card->getAsString();
            }
        return $result;
    }
}
