<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for ProjectController.
 */
class ProjectControllerTest extends WebTestCase
{
    /**
     * Verify that the route is working as expected
     * and the right site is shown.
     */
    public function testHomeRoute()
    {
        $client = static::createClient();
        $client->request('GET', 'proj');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }
}
