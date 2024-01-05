<?php
    class User{
        public $userId;
        public $userFirstName;
        public $userLastName;
        public $userEmail;
        public $userPassword;
        public $userStatus;

        public function __construct($userId, $userFirstName, $userLastName, $userEmail, $userPassword, $userStatus){
            $this->userId = $userId;
            $this->userFirstName = $userFirstName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPassword = $userPassword;
            $this->userStatus = $userStatus;
        }
    }
?>