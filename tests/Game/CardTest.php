<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties.
     */
    public function testCreateCard(): void
    {
        $card = new Card("Diamonds", "6");
        $this->assertInstanceOf("\App\Game\Card", $card);

        $this->assertEquals("Diamonds", $card->getColor());
        $this->assertEquals("6", $card->getNumber());
    }

    /**
     * Verify that the object has the expected
     * properties for the number value.
     */
    public function testCardNumber(): void
    {
        $card = new Card("Diamonds", "6");
        $this->assertEquals("6", $card->getNumber());

    }

    /**
     * Verify that the object has the expected
     * properties for the color value.
     */
    public function testCardColor(): void
    {
        $card = new Card("Diamonds", "6");
        $this->assertEquals("Diamonds", $card->getColor());

    }

    /**
     * Verify that the object has the expected
     * properties for the number value.
     */
    public function testCardNumberValue(): void
    {
        $card = new Card("Diamonds", "J");
        $this->assertEquals(11, $card->getNumberValue());

    }

    /**
     * Verify that the object has the expected
     * properties for the card value.
     */
    public function testCardShowCard(): void
    {
        $card = new Card("Diamonds", "J");
        $this->assertEquals("J", $card->getShowCard());

    }

    /**
     * Verify that the string returned has the expected
     * properties for the card value.
     */
    public function testCardGetAsString(): void
    {
        $card = new Card("Diamonds", "8");
        $this->assertEquals("8 of Diamonds", $card->getAsString());

    }
}
