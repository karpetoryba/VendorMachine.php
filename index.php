//modelisation
<?php
class VendorMachine {
    private bool $isOn;
    private int $snacksQty;
    private int $money;


    public function __construct() {
        $this->isOn = false;
        $this->snacksQty = 50;
        $this->money = 0;
    }
    
 public function buySnack(): void {
    $this->isOn = true;

    if ($this->snacksQty === 0) {
        throw new Exception("Plus de snacks");
    }
    $this->snacksQty -= 1;
    $this->money += 2;
}

public function reset(): void {
    $this->isOn = false;

    if (this->snacksQty > 50) {
      throw new Exception("la machine est deja rempli");
    }
    $this->snacksQty = $this->calculateLeftSnackQty();

    $this->money = 0;
    $this->isOn = true;
  }

  private function calculateLeftSnackQty() {
    return $this->snacksQty + (50 - $this->snacksQty);
}

public function shootWithFoot(): string {
  $this->isOn = false;

  $this->dropMoney();
  $this->dropSnacks();

  return "Snacks tombés : {$this->snacksQty} et monnaie tombée : {$this->money}";
}



  private function dropMoney() {
    $moneyToDrop = 20;
    if ($this->money < 20) {
        $moneyToDrop = $this->money;
    }
    $this->money = $this->money - $moneyToDrop;
}

private function dropSnacks() {
     $snacksQtyToDrop = 5;
    if ($this->snacksQty < 5) {
      $snacksQtyToDrop = $this->snacksQty;
    }
    $this->snacksQty = $this->snacksQty - $snacksQtyToDrop;
  }
}

$machine = new VendorMachine();
echo $machine->shootWithFoot();