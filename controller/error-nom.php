<?php

require_once '../model/Order.php'; 

session_start();

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
    
    try {
      
        $order->setCustomerName(''); 
    } catch (Exception $e) {
        echo "Erreur lors de la définition du nom du client: " . $e->getMessage();
    }
} else {
    echo "Vous avez fait une erreur avec votre prénom.";
}

