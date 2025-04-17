<?php

namespace App\Card;

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

    public function getAsString(): string
    {
        return "{$this->number} of {$this->color}";
    }
}
