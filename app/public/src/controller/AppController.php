<?php

namespace Mii\Invoice\Controller;

use Mii\Framework\AbstractController;

class AppController extends AbstractController
{
    public function home()
    {
       $this->render('app/index.php', ['name' => 'Maxime']);
    }

    public function billing()
    {
        echo "invoice page";
    }

    public function notFound()
    {
        echo "not found";
    }
}