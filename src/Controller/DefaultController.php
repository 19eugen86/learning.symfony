<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.01.2018
 * Time: 21:02
 */

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/default/new", name="default_new")
     */
    public function new(Request $request)
    {
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/new.html.twig', [
           'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/default/new/success", name="task_success")
     */
    public function success() {
        return $this->render('default/success.html.twig');
    }
}