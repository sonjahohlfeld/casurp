<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 13.08.18
 * Time: 13:49
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Product extends Controller
{
    /**
     * @Route("/products")
     */
    public function displayProductsAction(){
        return $this->render("product.html.twig");
    }
}