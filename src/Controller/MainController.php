<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.01.2018
 * Time: 20:12
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
    /**
     * @Route("/{_locale}", defaults={"_locale"="en"}, requirements={
     *      "_locale"="en|fr"
     * })
     */
    public function homepage($_locale)
    {

    }

    public function show($slug)
    {
        $url = $this->generateUrl('blog_show', [
            'slug' => 'my-blog-post'
        ]);
    }
}