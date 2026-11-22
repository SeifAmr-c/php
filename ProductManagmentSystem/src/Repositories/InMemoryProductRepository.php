<?php

require_once __DIR__ . '/../Entities/Product.php' ;
require_once __DIR__ . '/../Interfaces/ProductRepositoryInterface.php' ; // because i need to access the getId() function in order to save the products in the array as key and value pairs
class InMemoryProductRepository implements ProductRepositoryInterface {
    private array $products = [] ; 

    public function FindByID(int $Id) : ?Product // return the product object if the id was found 
    {
        return $this->products[$Id]??null; // if the product id is not found retrun null 
    }

    public function save( Product $product) : void  // saving a product object in a $product variable
    {
        $this->products[$product->getId()] = $product; // saving product in products array using key and value method
    }
    


}