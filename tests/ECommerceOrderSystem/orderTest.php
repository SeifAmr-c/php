<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../E-commerce order system/Interfaces/orderInterface.php';
require_once __DIR__ . '/../../E-commerce order system/Classes/order.php';

class OrderTest extends TestCase
{
    public function testCalculateTotal(): void
    {
        $order = new Order('Laptop', 25000, 2);

        $this->assertEquals(50000, $order->calculateTotal());
    }
}