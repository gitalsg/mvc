<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for ProjectController.
 */
class ProjectControllerTest extends WebTestCase
{
    /**
     * Verify that the route for the home page is working as expected
     * and the right site is shown.
     */
    public function testHomeRoute()
    {
        $client = static::createClient();
        $client->request('GET', 'proj');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for about page is working as
     * expected and the right site is shown.
     */
    public function testRouteAbout()
    {
        $client = static::createClient();
        $client->request('GET', 'proj/about');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route halsa is working as
     * expected and the right site is shown.
     */
    public function testRouteHalsa()
    {
        $client = static::createClient();
        $client->request('GET', 'proj/halsa');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for first diagram is working as
     * expected and the right site is shown.
     */
    public function testRouteDiagMat()
    {
        $client = static::createClient();
        $client->request('GET', 'proj/diag/mat');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('canvas');
    }

    /**
     * Verify that the route for second diagram is
     * working as expected and the right site is shown.
     */
    public function testRouteDiagBarn()
    {
        $client = static::createClient();
        $client->request('GET', 'proj/diag/barn');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('canvas');
    }
}
