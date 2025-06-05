<?php

namespace App\Tests\Controller;

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
        $client = static::createClient();
        $crawler = $client->request('GET', '/game/pig');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Pig game');
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
