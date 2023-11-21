<?php

use PHPUnit\Framework\TestCase;


class orderTest extends TestCase {


    public function test_getValidOrderURL() {
        $url = 'http://www.sweat-spot.com/checkout/order-received/22/?key=wc_order_tLbeqzqWn1Qfe';
        $response = file_get_contents($url);

        $this->assertStringContainsString ('Thank you. Your order has been received.', $response);
        $this->assertStringContainsString ('November 20, 2023', $response);
        !$this->assertStringContainsString ('November 20, 2020', $response);
        
    }
}
?>
