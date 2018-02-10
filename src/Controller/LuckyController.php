<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.01.2018
 * Time: 19:31
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}