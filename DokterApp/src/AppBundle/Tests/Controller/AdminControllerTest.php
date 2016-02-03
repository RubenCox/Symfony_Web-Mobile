<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\Web\AdminController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
//
{

    public function testShowAdminDoktersPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/dokters');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dokter toevoegen")')->count()
        );
    }

    public function testShowAdminDoktersAddPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/dokters/add');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dokter")')->count()
        );
    }

    public function testShowAdminDoktersEditPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/dokters/edit/21');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dokter")')->count()
        );
    }

    public function testShowAdminLokalenPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/lokalen');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Lokaal toevoegen")')->count()
        );
    }

    public function testShowAdminLokalenAddPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/lokalen/add');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Lokaal toevoegen")')->count()
        );
    }

    public function testShowAdminLokalenEditPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/lokalen/edit/7');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Lokaal Aanpassen")')->count()
        );
    }

}
