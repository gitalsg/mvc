<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHandPlayer.
 */
class CardHandPlayerTest extends TestCase
{
    /**
     * Verify that the players hand can take a card
     * and add it to the hand.
     */
    public function testCardAddCardplayer()
    {
        $hand = new CardHandPlayer();
        $card = new Card("Diamonds", "6");
        $hand->addCard($card);
        $this->assertEquals(1, $hand->getNumberCards());
    }

    /**
     * Test to see get the values of players hand
     * after a card has been added to the hand.
     */
    public function testPlayerGetValues()
    {
        $hand = new CardHandPlayer();
        $hand->addCard(new Card("Hearts", "8"));

        $exp = [8];
        $this->assertEquals($exp, $hand->getValues());
    }

    /**
     * Verify that the total value of players hand
     * after taking cards is correct. Test over 21 with A as value 1.
     */
    public function testPlayerGetTotalValueEss()
    {
        $hand = new CardHandPlayer();
        $hand->addCard(new Card("Diamonds", "6"));
        $hand->addCard(new Card("Spades", "A"));
        $hand->addCard(new Card("Diamonds", "10"));

        $this->assertEquals(17, $hand->getTotalValue());
    }

    /**
     * Verify that the object has the expected
     * properties of graphic.
     */
    public function testCardPlayerGetString()
    {
        $hand = new CardHandPlayer();
        $hand->addCard(new CardGraphic("Diamonds", "6"));

        $res = $hand->getString();
        $this->assertIsArray($res);
        
        $this->assertEquals(["6♦"], $res);
    }

    /**
     * Verify that the object returns the expected
     * cards of players hand.
     */
    public function testPlayerGetCards()
    {
        $hand = new CardHandPlayer();
        $card = new Card("Diamonds", "6");
        $hand->addCard($card);

        $cards = $hand->getCards();
        $this->assertCount(1, $cards);
        
        $this->assertSame($card, $cards[0]);
    }
}
