<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.01.2018
 * Time: 10:07
 */

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SomeService
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function someMethod()
    {
        $url = $this->router->generate('blog_show', [
            'slug' => 'my-blog-post'
        ]);
    }
}