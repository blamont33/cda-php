<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\CartItem;
use Mii\Invoice\Service\CartService;

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

        $cartService = new CartService;
        $cart = $cartService->get();
        $cartItem = new CartItem();
        $cartItem->setProduct($product);
        $cartItem->setQuantity(1);

        $cart->addCartItem($cartItem);

        $cartService->update($cart);

        header('Location: /');
        exit;
    }
}
