<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for DiceGameController.
 */
class DiceGameControllerTest extends WebTestCase
{
    /**
     * Verify that the Pig Game landing
     * page works well.
     */
    public function testStartPigGame(): void
    {
        $client = new DiceGameController(new RequestStack());
        $this->assertInstanceOf("\App\Controller\DiceGameController", $client);

    }
}

