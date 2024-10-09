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
	<p>On vous prépare le commend pour le livraison<p>
	<h2>choisir le mode de livraison :</h2>
    <form action="process_delivery.php" method="post">
        <label>
            <input type="radio" name="delivery_method" value="Chronopost Express" required>
            Chronopost Express
        </label>
        <br>
        <label>
            <input type="radio" name="delivery_method" value="Point relais" required>
            Point relais
        </label>
        <br>
        <label>
            <input type="radio" name="delivery_method" value="Domicile" required>
            Domicile
        </label>
        <br><br>
        <input type="submit" value="choisir">
    </form>
	</main>

	</body>
</html>