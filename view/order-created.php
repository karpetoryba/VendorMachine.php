<!DOCTYPE html>
<html>
	<head>
		<title>Commande créée</title>
	</head>
	<body>

	<header>
		<h1>Le Eshop au top</h1>
	</header>
	
	<main>
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