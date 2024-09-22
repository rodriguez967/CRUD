<?php
require_once("dbconfig.php");

if(isset($_REQUEST['del']))
{
    $userid = intval($_GET['del']);
    $sql = 'DELETE FROM accounts WHERE id =:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $userid,PDO::PARAM_STR);
    $stmt->execute();   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
            InScents
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        <link href="https://cdn.datatables.net/1.10.25/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 style= "text-align: center;">InScents</h1>
    <ul class="nav nav-pills nav-justified">
        <br>
        <hr>
  <li role="presentation" ><a href="#">Dashboard</a></li>
  <li role="presentation" class="active"><a href="#">Products</a></li>
  <li role="presentation"><a href="#">Stocks</a></li>
  <li role="presentation"><a href="#">Sales</a></li>
  <li role="presentation"><a href="#">Reports</a></li>
</ul>
<hr>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
            <h3>Products Page</h3>
            <hr>
               
            
			<div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                   
                    <th>#</th>
                    
                    <th>Name</th>
                    <th>Passowrd</th>
                    <th>Action</th>
                
                
                   

                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM accounts";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
                    


                    if ($stmt->rowCount() > 0 ){
                        foreach($results as $result)
                    {
                    ?> 
                    <tr>
                    <td><?php echo htmlentities($result->id);?></td>
                       
                        <td><?php echo htmlentities($result->username);?></td>
                        <td><?php echo htmlentities($result->password);?></td>
                        
                       
                        <td>
                            <a href="update_product.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-primary btn-sm"><span class= "glyphicon glyphicon-pencil"></span></a>
                            <a href="view_product.php?del=<?php echo htmlentities($result->id);?>" class="btn btn-danger btn-sm" onClick="return confirm('Confirm deleting this data?')"><span class= "glyphicon glyphicon-trash"></span></a>    
                        </td>
                        </td>

                    </tr>
                    <?php
                       
                    }}
                    ?>
                     <div class="row" style="margin-top:1%">
                    <div class="col-md-12">
                        <a href="add_product.php" class="btn btn-primary">Add</a>
                     
                      
                       <br>
                       <br>
                    </div>
                </div>
                </div>
                </tbody>
                </table>
              
            </div>
            </div>
</head>
<body>
    
</body>
</body>


</html>