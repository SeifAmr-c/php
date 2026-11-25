<?php

require_once __DIR__ . '/../src/Entities/Product.php';
require_once __DIR__ . '/../src/Interfaces/ProductRepositoryInterface.php';
require_once __DIR__ . '/../src/Repositories/InMemoryProductRepository.php';

use PHPUnit\Framework\TestCase;


class InMemoryProductRepositoryTest extends TestCase {
    public function testIfItCanSaveProductIfIdExists(){
        $repository = new InMemoryProductRepository(); 
        $newProduct = new Product(1,'computer',1.67); 
        $repository->save($newProduct);
        // returns an object because the id exists
        $result = $repository->FindByID(1); 
        // will return null because there is no product id with this number
        $resultNull = $repository->FindByID(2); 
        // Making sure that the $result hold a product object
        $this->assertInstanceOf(Product::class,$result);  
        // Assumed to return null because there is no object will be returned
        $this->assertNull($resultNull) ; 
        // checking if the id returned is the same as the insterted
        $this->assertSame('computer',$result->getName()) ; 
        // Checking if the product object created is the same object returned by the result 
        $this->assertSame($newProduct, $result);
        
    }

    public function testIfItCanSaveMultipleProducts(){
        $repository = new InMemoryProductRepository(); 
        $newProduct = new Product(1,'computer',1.69); 
        $productNumberTwo = new Product(2,'PS4',800);
        $repository->save($newProduct);
        $repository->save($productNumberTwo);
        $resultFirstProduct = $repository->FindByID(1);
        $resultSecondProduct= $repository->FindByID(2);
        $resultNull= $repository->FindByID(3);
        $this->assertInstanceOf(Product::class,$resultFirstProduct);
        $this->assertInstanceOf(Product::class,$resultSecondProduct);
        $this->assertSame('computer',$resultFirstProduct->getName());
        $this->assertSame('PS4',$resultSecondProduct->getName());
        $this->assertNull($resultNull);
        $this->assertSame($newProduct, $resultFirstProduct);
        $this->assertSame($productNumberTwo, $resultSecondProduct);
    }
}
