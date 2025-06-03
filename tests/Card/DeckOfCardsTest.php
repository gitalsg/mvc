<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DeckOfCards.
 */
class DeckOfCardsTest extends TestCase
{
    /**
     * Verify that the object returns the expected
     * amount of cards for a deck of 52.
     */
    public function testDeckOfCards(): void
    {
        $deck = new DeckOfCards();

        $this->assertCount(52, $deck->all());
    }

    /**
     * Verify that the object returns the expected
     * amount of cards for a deck after a card has been taken.
     */
    public function testLeftDeckOfCards(): void
    {
        $deck = new DeckOfCards();
        $this->assertEquals(52, $deck->getRemainingDeck());

        $deck->takeCard();
        $this->assertEquals(51, $deck->getRemainingDeck());
    }

    /**
     * Shuffle the deck and verify that the object returns the
     * deck of cards in a different order than deck (shuffled).
     */
    public function testDeckOfCardsShuffled(): void
    {
        $deck = new DeckOfCards();
        $deckordered = $deck->getAsString();

        $deck->shuffle();
        $deckshuffled = $deck->getAsString();

        $this->assertNotEquals($deckordered, $deckshuffled);
    }
}
