<?php
    class userOrder{
        public $orderId;
        public $orderPrice;
        public $orderDate;

        public function __construct($orderId,$orderPrice, $orderDate){
            $this->orderId = $orderId;
            $this->orderPrice = $orderPrice;
            $this->orderDate = $orderDate;
        }
    }
?>