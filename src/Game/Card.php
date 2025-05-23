<?php

namespace App\Game;

/**
 * Card will create a specific card. It creates an individual card with the cards value.
 */
class Card
{
    protected string $color;
    protected string $number;

    /**
     * Construct object with a color and number; this gives the cards a value.
     */
    public function __construct(string $color, string $number)
    {
        $this->color = $color;
        $this->number = $number;
    }

    /**
     * To extract a cards properties, to know which color the card has.
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Provides an extraction of a cards properties, to know which number the card has.
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * To get the specific value for the card, to know the value in numbers. This way, it is possible to sum the cards value.
     */
    public function getNumberValue(): int
    {
        return match ($this->number) {
            'A' => 14,
            'K' => 13,
            'Q' => 12,
            'J' => 11,
            '10', '9', '8', '7', '6', '5', '4', '3', '2' => (int)$this->number,
            default => 0,
        };
    }

    /**
     * To show the card as it is; when an A is drawn, you will see an A not 14 or 1, as its value.
     */
    public function getShowCard(): string
    {
        return match ($this->number) {
            'A' => 'A',
            'K' => 'K',
            'Q' => 'Q',
            'J' => 'J',
            default => $this->number,
        };
    }

    /**
     * To get the card as a string, to print out the card.
     */
    public function getAsString(): string
    {
        return "{$this->number} of {$this->color}";
    }
}
