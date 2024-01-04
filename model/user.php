<?php
    class User{
        public $userFirstName;
        public $userLastName;
        public $userEmail;
        public $userPassword;
        public $userStatus;

        public function __construct($userFirstName, $userLastName, $userEmail, $userPassword, $userStatus){
            $this->userFirstName = $userFirstName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPassword = $userPassword;
            $this->userStatus = $userStatus;
        }
    }
?>