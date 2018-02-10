<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.01.2018
 * Time: 20:15
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlogApiController extends Controller
{
    /**
     * @Route("/api/posts/{id}", methods={"GET", "HEAD"})
     */
    public function show($id)
    {

    }

    /**
     * @Route("/api/posts/{id}", methods="PUT")
     */
    public function edit($id)
    {

    }
}