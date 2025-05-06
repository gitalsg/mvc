<?php

namespace App\Card;

class CardGraphic extends Card
{
    /**
    * @var array<string, string>
    */
    private array $representation = [
        'Hearts' => '♥',
        'Diamonds' => '♦',
        'Clubs' => '♣',
        'Spades' => '♠'
    ];

    public function __construct(string $color, string $number)
    {
        parent::__construct($color, $number);
    }

    public function getAsString(): string
    {
        $symbol = $this->representation[$this->getColor()] ?? '?';
        return "{$this->getNumber()}{$symbol}";
    }
}
