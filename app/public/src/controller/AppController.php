<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;

class AppController extends AbstractController
{
    public function home()
    {
        $products = (new ProductManager)->findAll();

        $this->render('app/index.php', ["name" => "Khalid", "products" => $products]);
    }

    public function edit()
    {
        $this->render('app/edit-product.php');
    }

    // sur /invoice
    public function billing()
    {
    }

    public function notFound()
    {
        echo "Not found";
    }
}
