<?php

use App\Dish;
use App\UnitOfWork;

   require_once('H:\xampp\htdocs\lab_45_AaPS\DAL\Entity\Dish.php');
   require_once('H:\xampp\htdocs\lab_45_AaPS\DAL\Entity\Order.php');
   require_once('H:\xampp\htdocs\lab_45_AaPS\DAL\EntityManager.php');
   require_once('H:\xampp\htdocs\lab_45_AaPS\DAL\UnitOfWork.php');
   $em = $entityManager;
   $UoW = new UnitOfWork($em);
   $dishRepository = $UoW->getDishRepository();

function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_dishes(): array
{
    global $dishRepository;
    $allDishes = $dishRepository->getAll();
    return $allDishes;
}

function get_dish(int $id): Dish
{
    global $dishRepository;
    $dish = $dishRepository->find($id);

    return $dish;
}
function editDish(int $id){
    global $UoW;
    $dish = get_dish($id);
    $dish->setName('Edited Name');
    $UoW->getEM()->flush();
    
    return "ok";
    
}
function removeDish(int $id){
    global $UoW;
    $dish = get_dish($id);
    if($dish){
        $UoW->getEM()->getConnection()->beginTransaction();
        $UoW->getEM()->remove($dish);
        $UoW->getEM()->flush();
        $UoW->getEM()->getConnection()->commit();
        return "ok";
    }
}
function createDish(){
    global $UoW;
    $dish = new Dish();
    if($dish){
        $UoW->getEM()->persist($dish);
        $UoW->getEM()->flush();
        return "Ok";
    }
    return "Not ok";
}

function add_to_cart(Dish $dish): void
{
    if (isset($_SESSION['cart'][$dish->getId()])) {
        $_SESSION['cart'][$dish->getId()]['qty'] += 1;
    } else {
        $_SESSION['cart'][$dish->getId()] = [
            'name' => $dish->getName(),
            'desc' => $dish->getDesc(),
            'img' => $dish->getImgUrl(),
            'price' => $dish->getPrice(),
            'qty' => 1,
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $dish->getPrice() : $dish->getPrice();
}
