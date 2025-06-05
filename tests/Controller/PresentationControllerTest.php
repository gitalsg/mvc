<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for PresentationController.
 */
class PresentationControllerTest extends WebTestCase
{
    /**
     * Verify that the route for the home page is working as expected
     * and the right site is shown.
     */
    public function testRouteHome()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for about page is working as
     * expected and the right site is shown.
     */
    public function testAboutRoute()
    {
        $client = static::createClient();
        $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for report page is working as
     * expected and the right site is shown.
     */
    public function testReportRoute()
    {
        $client = static::createClient();
        $client->request('GET', '/report');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for metrics page is working as
     * expected and the right site is shown.
     */
    public function testMetricsRoute()
    {
        $client = static::createClient();
        $client->request('GET', '/metrics');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom01 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom01()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom01');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom02 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom02()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom02');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom03 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom03()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom03');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom04 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom04()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom04');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom05 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom05()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom05');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom06 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom06()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom06');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for kmom10 page is working as
     * expected and the right site is shown.
     */
    public function testRouteKmom10()
    {
        $client = static::createClient();
        $client->request('GET', '/report#kmom10');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }

    /**
     * Verify that the route for lucky page is working as
     * expected and the right site is shown.
     */
    public function testRouteLucky()
    {
        $client = static::createClient();
        $client->request('GET', '/lucky');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html');
    }
}
