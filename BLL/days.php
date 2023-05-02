<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/BLL/menuGen.php';

    $day = $_GET['id'];
    if (!empty($menu)) {?>
            <div class="section-top-border">
				<h3 class="mb-30"><?= $day . ' menu'?></h3>
				<div class="row">
					<div class="col-md-3">
						<img src="img/elements/d.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-md-9 mt-sm-20">
						<?php
                        $total = 0; 
                        foreach ($menu as $cat => $dish) { ?>
                            <p><b><?= $cat; ?></b> - <?= $dish->getName() ?></p>
                            <p><b>Price:</b> - <?= $dish->getPrice() ?></p>
                            <br>
                            <?php $total += $dish->getPrice(); 
                        } ?>
                        <p><b>Total Price</b> - <?= $total ?></p>
					</div>
				</div>
			</div>
    <?php }
    