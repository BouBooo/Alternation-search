<?php 
  require '_classes/database.php';

  $nameError = $site = $name = $siteError = $status = $statusError = $addError = $phone = $phoneError = $category = $categoryError = $address = $addressError = "";

  if(!empty($_GET['id']))
  {
    $id = $_GET['id'];
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM entreprises WHERE id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name =         $item['name'];
    $site =         $item['site'];
    $phone =        $item['phone'];
    $status =        $item['status'];
    $address =          $item['address'];

    if($item['category'] == "web")
    {
        $category = "Web development";
    }
    else if($item['category'] == "software")
    {
        $category = "Software development";
    }
    else if($item['category'] == "network")
    {
        $category = "Network / Security";
    }
  }




    if(!empty($_POST))
    {
      $name =         $_POST['name'];
      $site =         $_POST['site'];
      $status =        $_POST['status'];
      $phone =         $_POST['phone'];
      $category =        $_POST['category'];
      $address =          $_POST['address'];
      $isSuccess = true;
  
      if(empty($name) || empty($site) || empty($status) || empty($phone) || empty($category) || empty($address))
      {
        $addError = "Can't insert empty input";
        $isSuccess = false;
      }
      else if($isSuccess)
      {
        $db = Database::connect();
        $statement = $db->prepare("UPDATE entreprises SET name = ?, category = ?, phone = ?, site = ?, address = ?, status = ? WHERE id = ?");
        $statement->execute(array($name,$category,$phone,$site,$address,$status, $id));
  
        Database::disconnect();
        header('Location: index.php');
      }
    }





?>


    <!DOCTYPE html>
    <html>
    <?php
    require('assets/head.php');
    ?>
        
        <body>
        <div class="container admin">
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>Alternation search<span class="glyphicon glyphicon-cutlery"></span></h1>
        <br>
        <h2><strong>Update compagny infos / status</strong></h2>
            <div class="row">

                      <br>
                    <form class="form" action="" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">
                                <option value="<?php echo $category; ?>">Current : <?php echo $category; ?></option>
                                <option value="web">Web development</option>
                                <option value="software">Software development</option>
                                <option value="network">Network & Security</option>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="site">Site:</label>
                            <input type="text" class="form-control" id="site" name="site" placeholder="Site" value="<?php echo $site;?>">
                            <span class="help-inline"><?php echo $siteError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $phone;?>">
                            <span class="help-inline"><?php echo $phoneError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $address;?>">
                            <span class="help-inline"><?php echo $addressError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="<?php echo $status; ?>">Current : <?php echo $status; ?></option>
                                <option value="to contact">To contact</option>
                                <option value="waiting for a response">Wating for a response</option>
                                <option value="refused">Refused</option>
                                <option value="accepted">Accepted</option>
                            </select>
                            <span class="help-inline"><?php echo $addError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" name="update" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Forward</a>
                       </div>
                    </form>
                     
                  
                  
                </div>
            </div>   
        </body>
    </html>