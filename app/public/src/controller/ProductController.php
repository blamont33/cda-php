<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;

class ProductController extends AbstractController
{
    public function edit()
    {
        $productManager = new ProductManager;
        $product = $productManager->findOneBy($_GET["id"]);

        if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
            $product->setName($_POST["name"]);
            $product->setPrice($_POST["price"]);
            
            if (!$productManager->edit($product)) {
                // Handle exception
            }

            header('Location: ' . $_SERVER["REQUEST_URI"]);
            exit;
        }

        $this->render('product/edit.html', ["product" => $product]);
    }
}