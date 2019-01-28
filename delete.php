<?php 
  require('_classes/database.php');

  if(!empty($_GET['id']))
  {
    $id = $_GET['id'];
  }
  
  if(!empty($_POST))
  {
    $id = $_POST['id'];
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM entreprises WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header('Location: index.php');
  }

?>

<!DOCTYPE html>
<html>
<?php
    require('assets/head.php');
?>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
         <h1><strong>Delete a compagny</strong></h1>
                  <br>
            <div class="row">
 

                <form class="form" action="delete.php" role="form" method="post">
                   <input type="hidden" name="id" value="<?php echo $id; ?>">

                   <p class="alert alert-warning">Are u sure about this deletion ? </p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Yes</button>
                        <a class="btn btn-default" href="index.php">No</a>
                   </div>
                </form>
                 
              
              
            </div>
        </div>   
    </body>
</html>
