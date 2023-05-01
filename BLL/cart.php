<?php

use App\UnitOfWork;

error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/DAL/EntityManager.php';

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $res = get_dish($id);

            if (!$res) {
                echo json_encode(['code' => 'error', 'answer' => 'Error product']);
            } else {
                add_to_cart($res);
                ob_start();
                require $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/UI/cart-modal.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;

        case 'show':
            require $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/UI/cart-modal.php';
            break;

        case 'clear':
            if (!empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
            }
            require $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/UI/cart-modal.php';
            break;
        case 'order':
                if (!empty($_SESSION['cart'])) {
                $uow = new UnitOfWork($entityManager);
                $uow->createOrder($_SESSION['cart']);
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
            }
            require $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/UI/cart-modal.php';
            break;

    }
}