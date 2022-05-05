<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\InvoiceManager;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\Invoice;
use Mii\Invoice\Model\InvoiceLine;

class InvoiceController extends AbstractController
{
    public function billing()
    {
        $order = [
            ["product" => 1, "quantity" => 3],
            ["product" => 2, "quantity" => 2],
            ["product" => 3, "quantity" => 1]
        ];

        $total = 0;

        $invoice = new Invoice();

        /**
         * @todo Enregistrer la facture en BDD.
         */
        foreach ($order as $orderLine) {
            $product = (new ProductManager)->findOneBy($orderLine["product"]);

            $invoiceLine = new InvoiceLine();
            $invoiceLine
                ->setProduct($product)
                ->setProductName($product->getName())
                ->setProductPrice($product->getPrice())
                ->setQuantity($orderLine["quantity"])
            ;

            $invoice->addInvoiceLine($invoiceLine);

            $total += $product->getPrice() * $orderLine["quantity"];
        }

        (new InvoiceManager)->create($invoice);

        $this->render('invoice/index.html', [
            "invoice" => $invoice,
            "total" => $total
        ]);
    }
}
