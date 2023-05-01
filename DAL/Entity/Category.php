<?php 
    namespace App;  

    use Doctrine\ORM\Mapping as ORM;
    /**
    * @ORM\Entity()
    * @ORM\Table(name="categories")
    */
    class Category
    {
        /**
        * @ORM\Id()
        * @ORM\GeneratedValue()
        * @ORM\Column(type="integer")
        */
        private $id;

        /**
        * @ORM\Column(type="string")
        */
        private $name;

        
        
        public function __construct($name) {
            $this->name =  $name;
        }
        public function getName(){
            return $this->name;
        }
        public function getId(){
            return $this->id;
        }
    }
