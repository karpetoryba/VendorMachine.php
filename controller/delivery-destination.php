<?php

require_once '../model/Order.php';

session_start();

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order']; // Correct, only assigned once

    // Sanitize and retrieve POST data
    $shippingCity = htmlspecialchars($_POST['shippingCity']); 
    $shippingAddress = htmlspecialchars($_POST['shippingAddress']);
    $shippingCountry = htmlspecialchars($_POST['shippingCountry']); 

    // Call method on the order object
    $order->deliveryDestination($shippingCity, $shippingAddress, $shippingCountry);
    
    // List products in the order (assuming listProducts() returns the product details)

  
    // Load the destination delivery view
    header('Location: ../view/destination-delivery.php');
} else {
    echo "No order in progress";
}

