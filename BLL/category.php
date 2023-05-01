<?php 
    use App\Category;
    use App\Dish;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/BLL/inc/funcs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/DAL/EntityManager.php';
    $requireCategory = $_GET['category_id'];
    if ($requireCategory == "all") {
       $allDishes = get_dishes();
       foreach ($allDishes as $item) { ?>
        <div class="col-lg-6 col-md-6">
        <div class="single_delicious d-flex align-items-center">
            <div class="thumb">
                <img src="img/burger/<?= $item->getImgUrl() ?>" alt="">
            </div>
            <div class="info">
                <h3><?= $item->getName(); ?></h3>
                <p>Great way to make your business appear trust and relevant.</p>
                <span><?= '$'.$item->getPrice(); ?></span>
                <a href="?cart=add&id=<?= $item->getId(); ?>" class="genric-btn primary circle add-to-cart" data-id="<?= $item->getId(); ?>">Add to cart</a>
            </div>
        </div>
    </div>
    <?php } 
    }
    $dishes = $entityManager->getRepository(Dish::class)
    ->findBy(['category' => $requireCategory]);
    if (count($dishes) > 0) {
        foreach ($dishes as $result) { ?>
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
        echo '<p>No dishes with such category now..</p>';
    }
