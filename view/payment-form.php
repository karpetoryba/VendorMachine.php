<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>

<header>
    <h1>Le Eshop au top - Payment</h1>
</header>

<main>
    <h2>Order Details</h2>
    <p><strong>Customer Name:</strong> <?php echo isset($customerName) ? htmlspecialchars($customerName) : 'N/A'; ?></p>
    <p><strong>Products:</strong></p>
    <ul>
        <?php if (isset($products) && is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <li><?php echo htmlspecialchars($product); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No products selected.</li>
        <?php endif; ?>
    </ul>

    <form action="finish.php" method="post">
        <h2>Payment Information</h2>

        <div>
            <label for="cardHolderName">Card Holder Name:</label>
            <input type="text" id="cardHolderName" name="cardHolderName" required>
        </div>

        <div>
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required>
        </div>

        <div>
            <label for="expiryDate">Expiry Date (MM/YY):</label>
            <input type="text" id="expiryDate" name="expiryDate" maxlength="5" placeholder="MM/YY" required>
        </div>

        <div>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" maxlength="3" required>
        </div>

       
        <button type="submit">Pay Now</button>
    </form>
</main>

</body>
</html>
