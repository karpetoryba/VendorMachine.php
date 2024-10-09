<?php

require_once '../model/Order.php';

session_start();

try {

    if (empty($_POST['customerName']) || empty($_POST['products']) || !is_array($_POST['products'])) {
        throw new Exception("information incorrect.");
    }

    $customerName = htmlspecialchars(trim($_POST['customerName']));
    $products = array_map('htmlspecialchars', array_map('trim', $_POST['products']));

  
    $order = new Order($customerName, $products);

    
    $_SESSION['order'] = serialize($order);

   
    header("Location: ../view/payment.php");
    exit();

} catch (Exception $e) {
 
    $_SESSION['error_message'] = $e->getMessage();

    
    header("Location: ../view/order-error.php");
    exit();
}
