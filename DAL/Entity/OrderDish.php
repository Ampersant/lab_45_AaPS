<?php 
    namespace App;

    use Doctrine\ORM\Mapping as ORM;
    /**
    *@ORM\Entity()
    *@ORM\Table(name="order_dishes")
    */
    class OrderDish{
        
        /** 
        *@ORM\Id()
        *@ORM\GeneratedValue()
        *@ORM\Column(name="id", type="integer", nullable=false)
        */
        private $id;
        
        /**
        *@ORM\ManyToOne(targetEntity="Order", inversedBy="orderDishes")
        *@ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
        */
        private $order;
        
        /**
        *@ORM\ManyToOne(targetEntity="Dish", inversedBy="orderDishes")
        *@ORM\JoinColumn(name="dish_id", referencedColumnName="id", nullable=false)
        */
        private $dish;
        
        /**
        *@ORM\Column(type="integer")
        */
        private $quantity;
        // Геттеры и сеттеры для свойств
        public function __construct(){
            
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setOrder($order){
            $this->order = $order;
        }
        public function setDish($dish){
            $this->dish = $dish;
        }
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
}
