<?php

class Order {

    public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";
	public static $MAX_PRODUCTS_BY_ORDER = 5;
	public static $BLACKLISTED_CUSTOMERS = ['David Robert'];
	public static $UNIQUE_PRODUCT_PRICE = 5;
	public static $AUTORIZED_SHIPPING_COUNTRIES = ['France', 'Belgique', 'Luxembourg'];
	public static $AVAILABLE_SHIPPING_METHODS = ['Chronopost Express', 'Point relais', 'Domicile'];
	public static $PAID_SHIPPING_METHOD = 'Chronopost Express';


    private array $products;
    private string $customerName;
    private float $totalPrice;
    private int $id;
    private DateTime $createdAt;
    private string $status;
    private ?string $shippingMethod;
    private ?string $shippingAddress;
    private ?string $shippingCity;
    private ?string $shippingAddressDetail;
    private ?string $shippingCountry;
    private ?string $allowedCountries;

    public function __construct(string $customerName, array $products) {
        if (count($products) > Order::$MAX_PRODUCTS_BY_ORDER) {
            throw new Exception("max ". Order::$MAX_PRODUCTS_BY_ORDER .  "produits par commande");
        }

        $this->status = Order::$CART_STATUS;
		$this->createdAt = new DateTime();
		$this->id = rand();
		$this->products = $products;
		$this->customerName = $customerName;
		$this->totalPrice = count($products) * Order::$UNIQUE_PRODUCT_PRICE;
        
        if (in_array($customerName, Order::$BLACKLISTED_CUSTOMERS)) {
			throw new Exception("Vous êtes blacklisté");
		}
        
        $this->customerName = $customerName;
        $this->totalPrice = count($products) * Order::$UNIQUE_PRODUCT_PRICE;

        echo "Commande {$this->id} créée pour {$this->customerName}, d'un montant de {$this->totalPrice} !\n";
    }

    // Méthode pour supprimer un produit
    public function removeProduct(string $product): void {
        $key = array_search($product, $this->products);

        if ($key !== false) {
            unset($this->products[$key]);
        }

        $productsAsString = implode(',', $this->products);
        echo "Liste des produits : {$productsAsString}\n";
    }

    // Ajouter des produits au panier
    public function addProduct(string ...$products): void {
        if ($this->status !== Order::$CART_STATUS) {
            throw new Exception("Vous ne pouvez pas ajouter de produits, la commande n'est pas en statut 'CART'.");
        }

        if (count($this->products) + count($products) >= Order::$MAX_PRODUCTS_BY_ORDER) {
            throw new Exception("max" . Order::$MAX_PRODUCTS_BY_ORDER ."produits par commande");
        }

        foreach ($products as $product) {
            if (in_array($product, $this->products)) {
                echo "Le produit {$product} est déjà dans le panier.\n";
                continue;
            }

            array_push($this->products, $product);
            echo "Le produit {$product} est dans le panier.\n";
        }
    }

    // Changer le statut de la commande
    public function completeOrder(): void {
        if (count($this->products) === 0) {
            throw new Exception("La commande est vide.");
        }

        $this->status = "Delivery";
        echo "La commande est prête pour la livraison.\n";
    }

    // Détails de la livraison
    public function deliveryProducts(string $shippingAddress, string $shippingCountry): void {
        //pays autorisés
        $allowedCountries = ['France', 'Belgium', 'Luxembourg'];
        if ($this->status !== "Delivery") {
            throw new Exception("La commande n'est pas prête pour la livraison.");
        }
        //vérifier la possibilité d'envoi vers le pays sélectionné
        if (!in_array($shippingCountry, $allowedCountries)) {
            throw new Exception("La livraison vers {$shippingCountry} n'est pas disponible.");
        }

        $this->shippingAddress = $shippingAddress;
		$this->shippingCountry = $shippingCountry;
		$this->status = Order::$SHIPPING_ADDRESS_SET_STATUS;

        echo "La livraison vers {$this->shippingCountry} est possible à l'adresse {$this->shippingAddress}.\n";
    }
//////////////////////////////////////////////
    public function deliveryMethod (string $shippingAddressDetail): void {
        $allowedCountries = ['chronopost', 'Express (+5e) ', 'point relais et domicile'];
if ($this->status !== "Delivery") {
        throw new Exception("La commande n'est pas prête pour la livraison.");
    }

    // Проверка, что выбранный метод доставки разрешён
    if (!in_array($shippingMethod, $allowedMethods)) {
        throw new Exception("Le méthode de livraison '{$shippingMethod}' n'est pas disponible.");
    }

    // Если метод доставки разрешён, сохраняем его
    $this->shippingMethod = $shippingMethod;
    echo "Le méthode de livraison '{$this->shippingMethod}' a été choisi.\n";
    }
    ///////////////////////////////////////////
}
//pour afficher le message de l'erreur
try {
    $order = new Order('Yoang frf', ['Casque', 'Téléphone', 'feuille']);
    
    // Appel du method removeProduct pour supprimer un produit
    $order->removeProduct('Téléphone');  // Suppression du produit 'Téléphone'

    // Appel du method addProduct pour ajouter un produit
    $order->addProduct('Banane', 'Banane');

    // Changer le statut de la commande
    $order->completeOrder();  //delivery

    // Appel du method deliveryProducts
    $order->deliveryProducts('123 Rue de Bordeaux', 'France');
    
} catch (Exception $error) {
    echo $error->getMessage();
}
