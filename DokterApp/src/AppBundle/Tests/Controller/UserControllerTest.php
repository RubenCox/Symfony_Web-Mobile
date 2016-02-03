<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\Web\UserController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
//
{

    public function testShowPostDoktersPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dokters');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dokters")')->count()
        );
    }

    public function testShowRegistreerPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registreer');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Registreer")')->count()
        );
    }

    public function testShowLoginPageAndTestRespons()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Login")')->count()
        );

    }

    public function testShowAbout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/about');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Ruben Cox")')->count()
        );

    }

}
