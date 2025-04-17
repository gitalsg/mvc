<?php

namespace App\Card;

class DeckOfCards
{
    private array $deck = [];

    public function __construct()
    {
        $color = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $number = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($color as $suit) {
            foreach ($number as $rank) {
                $this->deck[] = new Card($suit, $rank);
            }
        }

        shuffle($this->deck);
    }

    public function takeCard(): ?Card
    {
        return array_pop($this->deck);
    }

    public function getRemainingDeck(): int
    {
        return count($this->deck);
    }
}
