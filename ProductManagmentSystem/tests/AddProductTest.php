<?php

require_once __DIR__ . '/../src/Entities/Product.php';
require_once __DIR__ . '/../src/Interfaces/ProductRepositoryInterface.php';
require_once __DIR__ . '/../src/UseCases/AddProductService.php';

use PHPUnit\Framework\TestCase;

class AddProductTest extends TestCase {
        public function testIfNameIsEmpty(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->method('FindById')
                ->willReturn(TRUE) ; 
            $repo
                ->expects($this->never())
                ->method('save') ; 
            //testing
            $result = $product->addProduct(1,'',2000);
            $this->assertSame('Please enter a valid name in order to continue',$result); 
        }

    }