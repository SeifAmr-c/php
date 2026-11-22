<?php

interface ProductRepositoryInterface{
    public function save(Product $product):void; // does not return anything
    public function FindById(int $Id); //  if found otherwise return null
}

