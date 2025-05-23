<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */
class CardGraphicTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties.
     */
    public function testCardGraphic(): void
    {
        $card = new CardGraphic("Diamonds", "6");
        $this->assertEquals("Diamonds", $card->getColor());
        $this->assertEquals("6", $card->getNumber());
    }

    /**
     * Verify that the object has the expected
     * properties of graphic.
     */
    public function testCardGraphicAsString(): void
    {
        $card = new CardGraphic("Diamonds", "6");
        $this->assertEquals("6♦", $card->getAsString());
    }
}
