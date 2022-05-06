<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\InvoiceManager;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\Invoice;
use Mii\Invoice\Model\InvoiceLine;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\TwigService;

class InvoiceController extends AbstractController
{
    public function billing()
    {
        $total = 0;

        $invoice = new Invoice();
        $cartService = new CartService;

        /**
         * @todo Enregistrer la facture en BDD.
         */
        foreach ($cartService->get()->getCartItems() as $cartItem) {
            $product = (new ProductManager)->findOneBy($cartItem->getProduct()->getId());

            $invoiceLine = new InvoiceLine();
            $invoiceLine
                ->setProduct($product)
                ->setProductName($product->getName())
                ->setProductPrice($product->getPrice())
                ->setQuantity($cartItem->getQuantity())
            ;

            $invoice->addInvoiceLine($invoiceLine);

            $total += $product->getPrice() * $cartItem->getQuantity();
        }

        (new InvoiceManager)->create($invoice);

        $data = [
            "invoice" => $invoice,
            "total" => $total
        ];

        $content = (new TwigService)->render('invoice/index.html', $data);

        $cartService->reset();

        exec("echo '$content' | wkhtmltopdf - "
        . __DIR__ . "/../../document/invoice-" . $invoice->getId() . ".pdf");

        $this->render('invoice/index.html', $data);
    }
}
