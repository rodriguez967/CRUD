<?php 
    require_once("dbconfig.php");
    require_once("command.php");


    $addProduct = $inventory->addProduct($_POST);
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
            <h3>Add New User</h3>
                </div>
            </div>
			<hr/>
            <form name="insertrecord" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <b>Name</b>
                        <input type="text" name="username" class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <b>Password</b>
                        <input type="text" name="password" class="form-control" >
                    </div>
                </div>

                
                

                <div class="row" style="margin-top:1%">
                    <div class="col-md-12">
                       <input type="submit" name="insert" class="btn btn-success" value="Submit">
                       <a href="view_product.php" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>