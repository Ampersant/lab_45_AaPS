<?php 
    namespace App;
    use App\UnitOfWork;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lab_45_AaPS/DAL/EntityManager.php';
        $UoW = new UnitOfWork($entityManager);
    return $UoW;