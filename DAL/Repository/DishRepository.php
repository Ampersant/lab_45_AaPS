<?php
  
    namespace App\Repository;
    
    use Doctrine\ORM\EntityRepository;

    class DishRepository extends EntityRepository{
        public function save(){

        }
        public function getAll(){
            $qb = $this->createQueryBuilder('e')->orderBy('e.id', 'DESC');
            return $qb->getQuery()->getResult();
        }
        public function findById(){

        }

    }