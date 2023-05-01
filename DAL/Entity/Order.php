<?php 
   namespace App;
    require_once('H:\xampp\htdocs\lab_45_AaPS\DAL\Entity\OrderDish.php');
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;

    /**
    * @ORM\Entity()
    * @ORM\Table(name="orders")
    */
    class Order
    {
        /**
        * @ORM\Id()
        * @ORM\GeneratedValue()
        * @ORM\Column(type="integer")
        */
        private $id;

        /**
        * @ORM\Column(type="datetime")
        */
        private $createdAt;

        /**
        * @ORM\Column(type="decimal", precision=10, scale=2)
        */
        private $totalPrice;

        public function __construct() {
            $this->createdAt = new \DateTime();
            $this->totalPrice = 0;
        }

        public function addDish(Dish $dish, $quantity) {
            $orderDish = new OrderDish();
            $orderDish->setOrder($this);
            $orderDish->setDish($dish);
            $orderDish->setQuantity($quantity);
            $this->totalPrice += $dish->getPrice() * $quantity;
        }

        // Геттеры и сеттеры для свойств
        
    }