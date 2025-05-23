<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHandBank.
 */
class CardHandBankTest extends TestCase
{
    /**
     * Verify that the bankhand can take a card
     * and add it to the hand.
     */
    public function testCardAddCardBank()
    {
        $hand = new CardHandBank();
        $card = new Card("Diamonds", "6");
        $hand->addCard($card);
        $this->assertEquals(1, $hand->getNumberCards());
    }

    /**
     * Test to see get the values of bankhand
     * after a card has been added to the hand.
     */
    public function testBankGetValues()
    {
        $hand = new CardHandBank();
        $hand->addCard(new Card("Hearts", "8"));

        $exp = [8];
        $this->assertEquals($exp, $hand->getValues());
    }

    /**
     * Verify that the total value of bankhand
     * after taking cards is correct. Test over 21 with A as value 1.
     */
    public function testBankGetTotalValueEss()
    {
        $hand = new CardHandBank();
        $hand->addCard(new Card("Diamonds", "6"));
        $hand->addCard(new Card("Spades", "A"));
        $hand->addCard(new Card("Diamonds", "10"));

        $this->assertEquals(17, $hand->getTotalValue());
    }

    /**
     * Verify that the total value of bankhand
     * after taking cards is correct. Test under 21.
     */
    public function testBankGetTotalValue()
    {
        $hand = new CardHandBank();
        $hand->addCard(new Card("Diamonds", "6"));
        $hand->addCard(new Card("Diamonds", "10"));

        $this->assertEquals(16, $hand->getTotalValue());
    }

    /**
     * Verify that the object has the expected
     * properties of graphic.
     */
    public function testCardGetString()
    {
        $hand = new CardHandBank();
        $hand->addCard(new CardGraphic("Diamonds", "6"));

        $res = $hand->getString();
        $this->assertIsArray($res);
        
        $this->assertEquals(["6♦"], $res);
    }

    /**
     * Verify that the object returns the expected
     * cards of bankhand.
     */
    public function testBankGetCards()
    {
        $hand = new CardHandBank();
        $card = new Card("Diamonds", "6");
        $hand->addCard($card);

        $cards = $hand->getCards();
        $this->assertCount(1, $cards);
        
        $this->assertSame($card, $cards[0]);
    }
}
