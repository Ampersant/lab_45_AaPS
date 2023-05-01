<?php 
    use App\Dish;
    use App\Category;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/BLL/inc/funcs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/DAL/EntityManager.php';
    
    $menu = [];
    for ($i=0; $i < 4; $i++) { 
        $categories  = $entityManager->getRepository(Category::class)
        ->findAll();
        $randCateg = $categories[array_rand($categories)];
        $dishes = $entityManager->getRepository(Dish::class)
        ->findBy(['category' => $randCateg->getId()]);
        $randDish = $dishes[array_rand($dishes)];
        $menu[$randCateg->getName()] = $randDish;
    }
    return $menu;
