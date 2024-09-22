<?php

Class inventory
{
    private $user = "root";
    private $pass = "";
 
    private $dsn = "mysql:host=localhost; dbname=diff";

    protected $con;


public function openConnection()
{
    try{
        $this->con = new PDO($this->dsn, $this->user, $this->pass);
        return $this->con;
    }
    catch(PDOException $e){
        echo "Error". e->getmessage();
    }
}

public function addProduct()

{

   
    if(isset($_POST['insert']))
    {
        $connection = $this->openConnection();
        $username = $_POST['username'];
        $password = $_POST['password'];
  


      	
        $sql = ("INSERT INTO accounts (`username`, `password`) VALUES (?,?)");

        $stmt = $connection->prepare($sql);
        $stmt->execute([$username, $password]);
        
       

        $lastInsertId = $connection->lastInsertId();

        if($lastInsertId)
        {
            echo "<script>alert('Product Added Succesfully ');</script>";
            echo "<script>window.location.href='view_product.php'</script>";
        }
        else
        {
           
            echo "<script>window.location.href='view_product.php'</script>";
        }
    }
}
}


$inventory = new inventory();

?>