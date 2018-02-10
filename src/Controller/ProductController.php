<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController extends Controller
{
    /**
     * @Route("/products", name="products")
     */
    public function indexAction()
    {
        $minPrice = 10;
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAllGreaterThanPrice($minPrice);

        $productsToDisplay = [];
        foreach ($products as $product) {
            $productsToDisplay[] = $product->getName();
        }
        return new Response('Products found: '.implode(',', $productsToDisplay));
    }

    /**
     * @Route("/product/add", name="product_add")
     */
    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish!');

        $em->persist($product);
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showAction(Product $product)
    {
        return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/product/edit/{id}")
     */
    public function updateAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
//        $product = $em->getRepository(Product::class)->find($id);
//
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }

        $product->setName('New product name: '.strtotime('now'));
        $em->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }

    /**
     * @Route("/product/delete/{id}")
     */
    public function deleteAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('products');
    }
}
