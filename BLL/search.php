<?php

use App\Dish;
use App\UnitOfWork;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/DAL/EntityManager.php';
    // retrieve the search query from the AJAX request
    $searchQuery = $_POST['search'];
    $queryBuilder = $entityManager->createQueryBuilder();
    $queryBuilder
    ->select('e')
    ->from(Dish::class, 'e')
    ->where('e.name LIKE :searchQuery')
    ->setParameter('searchQuery', '%'.$searchQuery.'%');
    // Execute the search query and retrieve the results
    $results = $queryBuilder->getQuery()->getResult();

    // Display the search results
    if (count($results) > 0) {
        foreach ($results as $result) { ?>
        <div class="col-lg-6 col-md-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="img/burger/8.png" alt="">
                        </div>
                        <div class="info">
                            <h3><?= $result->getName(); ?></h3>
                            <p>Great way to make your business appear trust and relevant.</p>
                            <span><?= '$'.$result->getPrice(); ?></span>
                            <a href="?cart=add&id=<?= $result->getId(); ?>" class="genric-btn primary circle add-to-cart" data-id="<?= $result->getId(); ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
        <?php }
    } else {
        echo '<p>No results found</p>';
    }
    ?>