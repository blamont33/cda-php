<?php

namespace Mii\Invoice\Controller;

use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;

class InvoiceController extends AbstractController
{
    public function billing()
    {
        $order = [
            ["product" => 1, "quantity" => 3],
            ["product" => 2, "quantity" => 2],
            ["product" => 3, "quantity" => 1]
        ];
       
        $products = [];
        $total = 0;

        foreach($order as $value) {
            $product = (new ProductManager)->findOneBy($value['product']);

            $products[] = ["product" => $product, "quantity" => $value["quantity"]];

            $total += $value['quantity'] * $product->getPrice();
        }
       

        $this->render('invoice/invoice.php', ['products' => $products, 'total' => $total]);
    }
}