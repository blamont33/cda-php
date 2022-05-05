<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Service\SessionStorage;

class CartController extends AbstractController
{
    public function add()
    {
        if (
            strtolower($_SERVER["REQUEST_METHOD"]) !== "post" ||
            (!isset($_POST["product"]) && $_POST["product"] !== "")
            ) {
            header('Location: /404');
            exit;
        }

        $product = (new ProductManager)->findOneBy($_POST["product"]);

        (new SessionStorage)->add('cart', $product);

    }
}
