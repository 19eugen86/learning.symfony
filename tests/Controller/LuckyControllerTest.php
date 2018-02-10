<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.02.2018
 * Time: 9:32
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LuckyControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();
        $client->request('GET', '/lucky/number');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCssSelector()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/lucky/number');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Your lucky number")')->count()
        );
    }

    public function testLinkClick()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/lucky/number');
        $link = $crawler->filter('a:contains("Greet")')
            ->eq(1)
            ->link();

        $crawler = $client->click($link);
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Success")')->count()
        );
    }

    public function testFormSubmit()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/default/new');
        $form = $crawler->selectButton('task[save]')->form();

        $form['task[task]'] = 'Test task';

        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Success")')->count()
        );
    }

    public function testResponse()
    {
        $client = static::createClient();
        $client->request('GET', '/lucky/number');

        $this->assertContains(
            'Your lucky number',
            $client->getResponse()->getContent()
        );
    }
}