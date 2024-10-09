<?php

require_once '../model/Order.php';

session_start();

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order']; 

   
    $shippingCity = htmlspecialchars($_POST['shippingCity']); 
    $shippingAddress = htmlspecialchars($_POST['shippingAddress']);
    $shippingCountry = htmlspecialchars($_POST['shippingCountry']); 

   
    $order->deliveryDestination($shippingCity, $shippingAddress, $shippingCountry);
    $_SESSION['order'] = $order; 


   
    header('Location: ../view/destination-delivery.php');
} else {
    echo "No order in progress";
}

