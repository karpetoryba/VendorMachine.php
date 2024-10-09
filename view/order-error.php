<!DOCTYPE html>
<html>
    <head>
        <title>Erreur</title>
    </head>
    <body>

    <header>
        <h1>Le Eshop au top</h1>
    </header>
    
    <main>
        <?php
        session_start();
       
        $errorMessage = $_SESSION['error_message'] ?? 'Une erreur est survenue lors du traitement de votre commande.';
        ?>
        <p>Il y a eu une erreur : <?php echo htmlspecialchars($errorMessage); ?></p>
    </main>

    </body>
</html>
