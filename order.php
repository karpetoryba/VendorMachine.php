<?php

class Order {

	private array $products;

	private string $customerName;

	private float $totalPrice;

	private int $id;
	private DateTime $createdAt;

	private string $status;

	private ?string $shippingMethod;

	private ?string $shippingAddress;

    private ?string $spippingCity;

    private ?string $spippingAdress;

    private ?string $spippingContry;




	public function __construct(string $customerName, array $products) {
        if (count($products) > 5) {
            throw new Exception("max 5 produits par commande");
        }

        $this->status = "CART";
		$this->createdAt = new DateTime();
		$this->id = rand();

        $this->products = $products;
        
        if ($customerName == 'David Robert') {
            throw new Exception("tu es dans le blackliste");
        }
        
        $this->customerName = $customerName;
        
		$this->totalPrice = count($products) * 5;

		echo "Commande {$this->id} créée pour {$this->customerName}, d'un montant de {$this->totalPrice} !\n";
	}

	// remove un object du panier
	public function removeProduct(string $product): void {
		$key = array_search($product, $this->products);

		if ($key !== false) {
			unset($this->products[$key]);
		}

		$productsAsString = implode(',', $this->products);
		echo "Liste des produits : {$productsAsString}\n";
	}

    
        //Ajouter un produit au panier
    public function addProduct(string ...$products): void {
        // Vérifiez si le nombre maximum de produits a été dépassé
        if (count($this->products) + count($products) > 5) {
            throw new Exception("max 5 produits par commande");
        } 
         //Ajouter des produits au panier
        foreach ($products as $product) {
         //Vérifier si un produit existe déjà dans le panier 
        if (in_array($product, $this->products)) {
            echo "Le produit {$product} est déjà dans le panier.\n";
            continue; // ignore l'ajout s'il existe déjà dans le panier
        }
        
        // Ajouter un produit s'il n'est pas déjà dans le panier
            array_push($this->products, $product);
            echo "Le produit {$product} est dans le panier.\n";
        }
    }
    
    
}
//pour afficher le message de l'erreur
try {
	$order = new Order('Yoang frf', ['Casque', 'Téléphone', 'feuille']);
    
    // Appel du method removeProduct pour supprimer un produit
    $order->removeProduct('Téléphone');  // Suppression du produit 'Téléphone'

  //Appel du method addProduct pour ajouter un produit
  $order->addProduct( 'Banane','Banane',);

    
} catch(Exception $error) {
    echo $error->getMessage();
}
