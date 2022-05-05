<?php

namespace Mii\Invoice\Manager;


use Mii\Framework\AbstractManager;
use Mii\Invoice\Model\Product;

class ProductManager extends AbstractManager
{
    public function findOneBy($id)
    {
        $product = $this->connection->query(
            "SELECT * FROM product WHERE id=" . $id
        )->fetch(\PDO::FETCH_ASSOC);

        if (!$product) {
            throw new \Exception("Erreur de produit");
            die;
        }

        return new Product($product);
    }

    public function findAll()
    {
        $productsData = $this->connection->query(
            "SELECT * FROM product"
        )->fetchAll(\PDO::FETCH_ASSOC);

        if (!$productsData) {
            throw new \Exception("Erreur de produit");
            die;
        }

        $products = [];

        foreach ($productsData as $data) {
            $products[] = new Product($data);    
        }

        return $products;
    }

    public function edit(Product $product)
    {
        $sql = "UPDATE product SET name=:name, price=:price WHERE id=:id";

        $request = $this->connection->prepare($sql);

        $request->bindValue('id', $product->getId());
        $request->bindValue('name', $product->getName());
        $request->bindValue('price', $product->getPrice());

        return $request->execute();
    }
}