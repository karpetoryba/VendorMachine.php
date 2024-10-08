<!DOCTYPE html>
<html>
<head>
    <title>Le Eshop au top</title>
</head>
<body>

<header>
    <h1>Le Eshop au top</h1>
</header>

<main>
    <form method="POST" action="../controller/create-order.php">
        <label for="customerName">Nom du client</label>
        <input type="text" id="customerName" name="customerName" required>
        <br>

        <label for="product">Produit</label>
        <select id="product" name="products[]" multiple>
            <option value="tshirt">T-shirt</option>
            <option value="jeans">Jeans</option>
            <option value="shoes">Chaussures</option>
            <option value="short">Short</option>
            <option value="cap">Casquette</option>
            <option value="pull">Pull</option>
        </select>
        <br>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Entrer l'adresse de livraison</h2>
    <form action="../controller/delivery-destination.php" method="POST">
        <label for="shippingAddress">Adresse :</label><br>
        <input type="text" id="shippingAddress" name="shippingAddress" required><br><br>

        <label for="shippingCity">Ville :</label><br>
        <input type="text" id="shippingCity" name="shippingCity" required><br><br>

        <label for="shippingCountry">Pays :</label><br>
        <input type="text" id="shippingCountry" name="shippingCountry" required><br><br>

        <input type="submit" value="Valider l'adresse">
    </form>
</main>
</body>
</html>
