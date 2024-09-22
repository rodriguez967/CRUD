<?php
    require_once 'dbconfig.php';

    if(isset($_POST['update']))
    {
        $userid = intval($_GET['id']);
        $prodname = $_POST['username'];
        $price = $_POST['password'];
   


        $sql = "UPDATE accounts SET username=:pn, password=:pr  WHERE id =:uid";

        $stmt = $pdo->prepare($sql);

        
        $stmt->bindParam('pn', $prodname,PDO::PARAM_STR);
        $stmt->bindParam('pr', $price,PDO::PARAM_STR);
        $stmt->bindParam('uid', $userid,PDO::PARAM_STR);
      
        $stmt->execute();
        echo "<script>alert('Record Succesfully Updated');</script>";
        echo "<script>window.location.href='view_product.php'</script>";

    }
?>


<html>
    <head>
        <title>
            InScents
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
            <h3>Edit User Details</h3>
                </div>
            </div>
			<hr/>

            <?php
                $userid = intval($_GET['id']);
                $sql = "SELECT * FROM accounts WHERE id=:uid";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam('uid', $userid, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                

                if($stmt->rowCount() > 0)
                {
                    foreach($result as $results);
                {

            ?>



            <form name="insertrecord" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <b>Name</b>
                        <input type="text" name="username" value = <?php echo htmlentities($results->username)?> class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <b>Password</b>
                        <input type="text" name="password" value = <?php echo htmlentities($results->password)?> class="form-control" required>
                    </div>
                </div>


                <?php
                }}
                ?>
                

                <div class="row" style="margin-top:1%">
                    <div class="col-md-12">
                       <input type="submit" name="update" class="btn btn-success" value="Update">
                       <a href="view_product.php" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>