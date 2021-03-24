<?php

    require 'database.php';

    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)){
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare('DELETE FROM items WHERE id = ?');
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;  
    }

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Menu Burger</title>
    
        <meta charset="utf-8" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">   </script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">  </script>
    
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Menu Burger <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container insert">
            <div class="row">
                <h1><strong>Supprimer un items </strong></h1>
                <br>
                <form class="form" role="form" action="delete.php" method="post">
                    
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer cet item ?</p>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">OUI</button>

                        <a class="btn btn-default" href="index.php">NON</a>
                    </div>
                </form>
                
                
            </div>
        </div>
    
    
    </body>
</html>