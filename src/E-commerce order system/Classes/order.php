<?php

class Order implements orderInterface{
    private string $productName ; 
    private int $price;
    private int $quantity ; 

    public function __construct(string $productName, int $price, int $quantity)
    {
        $this->productName = $productName ; 
        $this->price = $price ; 
        $this->quantity = $quantity ; 
    }

    #[Override]
    public function calculateTotal()
    {
        return $this->price * $this->quantity ; 
    }

    #[Override]
    public function getOrderDetails()
    {
        return "The product name: ".$this->productName."<br>The price: ".$this->price." <br>The quantity: ".$this->quantity;
    }
}
