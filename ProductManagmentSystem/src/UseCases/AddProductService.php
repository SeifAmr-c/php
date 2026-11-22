<?php
require_once '../Entities/Product.php'; // to create a new product
require_once '../Interfaces/ProductRepositoryInterface.php'; // to access the interface that is gonne be implemented
class AddProductService {


    public function __construct( private ProductRepositoryInterface $Repository) // passing the user repo memory as a parameter to make sure the object that will be passed will implement this interface 
    {
        $this->Repository = $Repository;  // saving the object data in this->Repo 
    }

    public function addProduct(int $id,string $name,float $price){
        // validation of the inputs
        if(empty($id)){
            return 'Please enter a valid id in order to continue'; 
        }
        if($id <= 0) {
            return 'The id can not be less than or equal to zero' ; 
        }
        if(empty($name)){
            return 'Please enter a valid name in order to continue'; 
        }
        if(empty($price)){
            return 'Please enter a valid number in order to continue';
        }
        if($price <= 0 ){
            return 'The price can not be 0' ; 
        }
        // what will happen if the id alrady exists
        $result = $this->Repository->FindById($id); 
        if($result){ // if existits it will return the product object
            return 'The product already exists please enter a new product id in order to continue'; 
        }
         // what will happen if all the validation passed
        $newProduct = new Product($id,$name,$price); 
        $this->Repository->save($newProduct); 
    }

    
}