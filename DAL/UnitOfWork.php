<?php
    namespace App;

use Doctrine\ORM\EntityManager;
    
    class UnitOfWork
    {
        private $entityManager;
    
        public function __construct(EntityManager $entityManager)
        {
            $this->entityManager = $entityManager;
        }
        public function getDishRepository(){
            return $this->entityManager->getRepository(Dish::class);
        }
        public function getOrderRepository(){
            return $this->entityManager->getRepository(Order::class);
        }
        public function getOrderDishRepository(){
            return $this->entityManager->getRepository(OrderDish::class);
        }
        public function getCategoryRepository(){
            return $this->entityManager->getRepository(Category::class);
        }
       public function getEM(){
        return $this->entityManager;
       }
    
        public function createOrder(array $dishes): Order
        {
            $order = new Order();
    
            foreach ($dishes as $dishId => $item) {
                $dish = $this->entityManager->getRepository(Dish::class)->find($dishId);
    
                if (!$dish) {
                    throw new \Exception(sprintf('Dish with id %d not found', $dishId));
                }
                $order->addDish($dish, $item['qty']);
            }
            $this->entityManager->persist($order);
            $this->entityManager->flush();
    
            return $order;
        }
    }