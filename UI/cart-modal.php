<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="#"><img src="img/<?= $item['img']; ?>" alt="<?= $item['name']; ?>"></a></td>
                    <td><a href="#"><?= $item['name']; ?></a></td>
                    <td><?= $item['price']; ?></td>
                    <td><?= $item['qty'] ?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="4" align="right">Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                    <br> Сумма: <?= $_SESSION['cart.sum'] ?> грн.
                </td>
            </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Корзина пуста...</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <a class="genric-btn info" data-dismiss="modal">Close</a>
    <?php if (!empty($_SESSION['cart'])): ?>
        <a class="genric-btn success circle" id="gen-order">Оформить заказ</a>
        <a class="genric-btn danger circle" id="clear-cart">Очистить корзину</a>
    <?php endif; ?>
</div>
