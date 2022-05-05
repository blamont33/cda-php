<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Cart extends AbstractModel
{
    private $cartItem = [];

    private $total = 0;

    /**
     * Get the value of cartItem
     */ 
    public function getCartItem()
    {
        return $this->cartItem;
    }

    /**
     * Set the value of cartItem
     *
     * @return  self
     */ 
    public function addCartItem($cartItem)
    {
        $this->cartItem[] = $cartItem;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
