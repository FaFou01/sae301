<?php
    class Notice{
        public $noticeContent;
        public $productId;

        public function __construct($noticeContent, $productId){
            $this->noticeContent = $noticeContent;
            $this->productId = $productId;
        }
    }
?>