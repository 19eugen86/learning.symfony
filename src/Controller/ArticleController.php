<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.01.2018
 * Time: 9:52
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    /**
     * @Route(
     *      "/articles/{_locale}/{year}/{slug}.{format}",
     *     defaults={"_format": "html"},
     *     requirements={
     *          "_locale": "en|fr",
     *          "_format": "html|rss",
     *          "year": "\d+"
     *     }
     * )
     */
    public function show($_locale, $year, $slug)
    {

    }
}