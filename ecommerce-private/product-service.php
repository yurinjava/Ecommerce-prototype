<?php 
class productService{
    private $connection;
    private $product;

    public function __construct(Connection $connection, Product $product){
        $this->connection = $connection->connect();
        $this->product = $product;
    }

    public function select(){
        $query ='select product_img, product_id, product_name, product_price from products';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectAlphabetical(){
         $query ='select product_img, product_id, product_name, product_price from products order by product_name';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectMotor(){
        $query ="select product_img, product_id, product_name, product_price from products where product_name like '%motor%'";
       $stmt = $this->connection->prepare($query);
       $stmt->execute();

       return $stmt->fetchAll(PDO::FETCH_OBJ);
   }
}
?>