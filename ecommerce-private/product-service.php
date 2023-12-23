<?php 
if(isset($_GET['filter'])){
    echo "<script>alert('iseet')</script>";
    $filter = $_GET['filter'];
}


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
    public function selectEngine(){
        $query ="select product_img, product_id, product_name, product_price from products where product_category = 'engine'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectAccessories(){
        $query ="select product_img, product_id, product_name, product_price from products where product_category = 'accessories'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectSuspension(){
        $query ="select product_img, product_id, product_name, product_price from products where product_category = 'suspension'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectBrakes(){
        $query ="select product_img, product_id, product_name, product_price from products where product_category = 'brake'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectTools(){
        $query ="select product_img, product_id, product_name, product_price from products where product_category = 'tools'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    

 
}
?>