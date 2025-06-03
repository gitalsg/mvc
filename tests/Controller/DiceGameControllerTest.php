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

    /** Test POST route /game/pig/init */
    public function testPigGameInit(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game/pig/init');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
    }

    public function testPigInitPostRedirects(): void
    {
        $client = static::createClient();
        $client->request('POST', '/game/pig/init', [
            'num_dices' => 2
        ]);

        $this->assertResponseRedirects('/game/pig/play');
    }
}

