<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/general.css">
    <link rel="stylesheet" href="assets/css/<?php echo $css?>.css">
    <title>Nuances - Parfumerie en ligne</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <?php 
        include_once("controller/navbarController.php");
        $navController = new NavbarController();
        $navController->invoke();
    ?>
    
    <main>