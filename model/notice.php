<?php
    class Notice{
        public $noticeUser;
        public $noticeContent;

        public function __construct($noticeUser, $noticeContent){
            $this->noticeUser = $noticeUser;
            $this->noticeContent = $noticeContent;
        }
    }
?>