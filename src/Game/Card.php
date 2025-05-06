<?php

namespace App\Game;

class Card
{
    protected string $color;
    protected string $number;

    public function __construct(string $color, string $number)
    {
        $this->color = $color;
        $this->number = $number;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
    
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

    public function getAsString(): string
    {
        return "{$this->number} of {$this->color}";
    }
}
