<?php
    class userOrder{
        public $orderId;
        public $orderPrice;
        public $orderDate;
        public $orderStatus;

        public function __construct($orderId,$orderPrice, $orderDate, $orderStatus){
            $this->orderId = $orderId;
            $this->orderPrice = $orderPrice;
            $this->orderDate = $orderDate;
            $this->orderStatus = $orderStatus;
        }
    }
?>