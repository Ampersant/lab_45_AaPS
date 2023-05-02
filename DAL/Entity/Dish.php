<?php 
    namespace App;
    require_once 'H:\xampp\htdocs\lab_45_AaPS\DAL\Entity\Category.php';
    use Doctrine\ORM\Mapping as ORM;
    use App\DishRepository;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\DishRepository")
     * @ORM\Table(name="dishes")
     */
    class Dish
    {
        /**
         * @ORM\Id()
         * @ORM\GeneratedValue()
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $name;
        /**
         * @ORM\Column(type="string")
         */
        private $description;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $img;

        /**
         * @ORM\Column(type="decimal", precision=10, scale=2)
         */
        private $price;
        /**
         * @ORM\ManyToOne(targetEntity="Category", inversedBy="dishes")
         * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
         */
        private $category;
        public function __construct(){
            $this->name = "Default name";
            $this->description = "Def desc";
            $this->img = "img.png";
            $this->price =12.5;
            $this->category = 26;
        }
        
        // Геттеры и сеттеры для свойств
        public function getId(){
            return $this->id;
        }
        public function getPrice(){
            return $this->price;
        }
        public function getName(){
            return $this->name;
        }
        public function getDesc(){
            return $this->description;
        }
        public function getCategory(){
            return $this->category;
        }
        public function getImgUrl(){
            return $this->img;
        }
        //sets
        public function setPrice($price){
            $this->price = $price;
        }
        public function setName($name){
            $this->name= $name;
        }
        public function setDesc($str){
            $this->description = $str;
        }
        public function setCategory($str){
            $this->category = $str;
        }
    }
