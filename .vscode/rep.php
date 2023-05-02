<?php 
    echo $entityPath[0] . "<br>";
    
    $order = new Order();
    // получаем репозиторий для нашей сущности (например, Dish)
    //$dishRepository = $entityManager->getRepository(Dish::class);
    $dishRepository = $entityManager->getRepository(Dish::class);
    // получаем все объекты из базы данных
    $UoW = new UnitOfWork($entityManager);
    $allDishes = $dishRepository->getAll();
    foreach($allDishes as $item){
        echo 'Name: ' . $item->getName() . "|| Price: " . $item->getPrice() . "<br>";
    };
    $UoW->createOrder($allDishes);
    $orderRep =  $entityManager->getRepository(Order::class);
    $allOrders = $orderRep->findAll();
    
   
    
    ?>