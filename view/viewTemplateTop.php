<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/general.css">
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/productList.css">
    <link rel="stylesheet" href="assets/css/panier.css">
    <link rel="stylesheet" href="assets/css/delivery.css">
    <link rel="stylesheet" href="assets/css/signin.css">
    <title>Nuances - Parfumerie en ligne</title>
</head>
<body>
    <?php 
        include_once("controller/navbarController.php");
        $navController = new NavbarController();
        $navController->invoke();
    ?>
    
    <main>