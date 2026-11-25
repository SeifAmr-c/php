<?php

require_once __DIR__ . '/../../src/ProductManagmentSystem/src/Entities/Product.php';
require_once __DIR__ . '/../../src/ProductManagmentSystem/src/Interfaces/ProductRepositoryInterface.php';
require_once __DIR__ . '/../../src/ProductManagmentSystem/src/UseCases/AddProductService.php';

use PHPUnit\Framework\TestCase;


class AddProductTest extends TestCase {
        public function testIfNameIsEmpty(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->expects($this->never())
                ->method('FindById');

            $repo
                ->expects($this->never())
                ->method('save') ; 
            //testing
            $result = $product->addProduct(1,'',2000);
            $this->assertSame('Please enter a valid name in order to continue',$result); 
        }   

        public function testIfidIsLessThanZero(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->expects($this->never())
                ->method('FindById');

            $repo
                ->expects($this->never())
                ->method('save') ; 
            //testing
            $result = $product->addProduct(-1,'computer',2000);
            $this->assertSame('The id can not be less than or equal to zero',$result); 
        }

        public function testIfPriceIsLessThanZero(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->expects($this->never())
                ->method('FindById');

            $repo
                ->expects($this->never())
                ->method('save') ; 
            //testing
            $result = $product->addProduct(4,'computer',-1);
            $this->assertSame('The price can not be 0',$result); 
        }
        public function testIfIdDoesNotExist(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->expects($this->once())
                ->method('FindById');

            $repo
                ->expects($this->once())
                ->method('save') ; 
            //testing
            $productIsSaved = $product->addProduct(4,'computer',6); // returns the object that is saved
            $this->assertSame(4, $productIsSaved->getId());
            $this->assertSame('computer', $productIsSaved->getName());
            $this->assertSame(6.0, $productIsSaved->getPrice());

        }

        public function testIfIdDoesExist(){
            // The object must be implementing Product Repo Interface 
            $repo = $this->createMock(ProductRepositoryInterface::class);
            // passed the repo as a paramter because it mocks the memory object and the add product service uses it in order to access find by id method
            $product = new AddProductService($repo);
            // checking
            $repo
                ->expects($this->once())
                ->method('FindById')
                ->willReturn(TRUE);

            $repo
                ->expects($this->never())
                ->method('save') ; 
            //testing
            $result = $product->addProduct(4,'computer',6);
            $this->assertSame('The product already exists please enter a new product id in order to continue',$result); // returns the object that is saved
        }
    }