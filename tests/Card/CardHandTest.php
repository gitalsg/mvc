<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHand.
 */
class CardHandTest extends TestCase
{
    /**
     * Verify that the players hand can take a card
     * and add it to the hand.
     */
    public function testCardAdd(): void
    {
        $hand = new CardHand();
        $card = new Card("Diamonds", "6");
        $hand->add($card);
        $this->assertEquals(1, $hand->getNumberCards());
    }

    /**
     * Test to see get the values of players hand
     * after a card has been added to the hand.
     */
    public function testGetValues(): void
    {
        $hand = new CardHand();
        $hand->add(new Card("Hearts", "8"));

        $exp = [8];
        $this->assertEquals($exp, $hand->getValues());
    }

    /**
     * Verify that the object has the expected
     * properties of graphic.
     */
    public function testCardGetString(): void
    {
        $hand = new CardHand();
        $hand->add(new CardGraphic("Diamonds", "6"));

        $res = $hand->getString();

        $this->assertEquals(["6♦"], $res);
    }

    /**
     * Verify that the object returns the expected
     * cards of players hand.
     */
    public function testGetCards(): void
    {
        $hand = new CardHand();
        $card = new Card("Diamonds", "6");
        $hand->add($card);

        $cards = $hand->getCards();
        $this->assertCount(1, $cards);

        $this->assertSame($card, $cards[0]);
    }
}
