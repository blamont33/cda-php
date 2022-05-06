<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\FlashService;
use Mii\Invoice\Service\TwigService;

class AppController extends AbstractController
{
    public function home()
    {
        $products = (new ProductManager)->findAll();

        $this->render('app/index.php', [
            "name" => "Khalid",
            "products" => $products,
            "cartLength" => (new CartService)->getCount(),
            "flashbag" => (new FlashService)->display()
        ]);
    }

    public function notFound()
    {
        echo "Not found";
    }
}
