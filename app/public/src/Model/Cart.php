<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;
use Mii\Invoice\Service\FlashService;

class Cart extends AbstractModel
{
    const CART = "cart";

    private $cartItems = [];

    private $total = 0;

    /**
     * Get the value of cartItem
     */ 
    public function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * Set the value of cartItem
     *
     * @return  self
     */ 
    public function addCartItem($cartItem)
    {
        $foundItem = array_filter($this->cartItems, function($element) use ($cartItem) {
            if ($element->getProduct()->getId() === $cartItem->getProduct()->getId()) {
                $element->setQuantity( (int) $element->getQuantity() + 1);
            }

            return $element->getProduct()->getId() === $cartItem->getProduct()->getId();
        });

        $flashService = new FlashService;
        $flashbag = $flashService->get();
        $flashbag->addFlashItem(
            (new FlashItem())->setMessage("Votre produit a bien été ajouté")
        );
        $flashService->update($flashbag);

        if (empty($foundItem)) {
            $this->cartItems[] = $cartItem;
        }

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
