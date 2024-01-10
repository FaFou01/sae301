<?php
    class Product{
        public $orderId;
        public $userId;
        public $orderPrice;
        public $orderDate;

        public function __construct($orderId, $userId, $orderPrice, $orderDate){
            $this->orderId = $orderId;
            $this->userId = $userId;
            $this->orderPrice = $orderPrice;
            $this->orderDate = $orderDate;
        }
    }
?>