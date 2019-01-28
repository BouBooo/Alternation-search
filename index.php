<!DOCTYPE html>
<html>
<?php
    require('assets/head.php');
    require('_classes/database.php');
?>
    
    <body>
    <div class="container">
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>Alternation search<span class="glyphicon glyphicon-cutlery"></span></h1>
        <br>
        <div class="row">
                <h2><strong>List of companies  </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Add</a></h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Site</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $db = Database::connect();
                        $list = $db->query('SELECT * FROM entreprises ORDER BY id DESC');
                        while($item = $list->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['category'] . '</td>';
                            echo '<td>'. $item['site'] . '</td>';
                            echo '<td>'. $item['phone'] . '</td>';
                            echo '<td>'. $item['address'] . '</td>';
                            echo '<td>'. $item['status'] . '</td>';
                            echo '<td width=300>';
                            //echo '<a class="btn btn-default" href="view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            //echo ' ';
                            //echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>