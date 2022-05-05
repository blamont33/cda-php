<?php

namespace Mii\Invoice\Service;

use Mii\Invoice\Model\CartItem;
use Mii\Invoice\Model\Cart;

class SessionStorage
{
    public function add($key, $value)
    {
        $cartItem = new CartItem;
        $cartItem->setProduct($value);
        $cartItem->setQuantity(1);

        $cart = new Cart;
        $cart->addCartItem($cartItem);

        $cartSession = $this->get($key);
        dump($cartSession);
        dump($cartItem);
        
        if($cartSession && array_search($cartItem, $cartSession->getCartItem()) !== null){
            
            $cartSession->
            dump($cartItem);

            //$_SESSION[$key] = $cart;
        }

        
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }
}