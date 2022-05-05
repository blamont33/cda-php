<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;

class AppController extends AbstractController
{
    public function home()
    {
        $this->render('app/index.php', ["name" => "Khalid"]);
    }

    // sur /invoice
    public function billing()
    {
    }

    public function notFound()
    {
        echo "Not found";
    }
}
