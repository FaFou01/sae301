<?php
    class NavbarController{
        public function invoke(){
            $isLoggedIn = isset($_SESSION['userId']);
            include('view/viewNavbar.php');
        }
    }
?>