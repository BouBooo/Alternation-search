<?php 
  require '_classes/database.php';

  $nameError = $site = $name = $siteError = $status = $statusError = $addError = $phone = $phoneError = $category = $categoryError = $address = $addressError = "";

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
      $addError = "Thanks to complete all inputs";
      $isSuccess = false;
    }


    if($isSuccess)
    {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO entreprises (name,category,phone,site,address,status) values (?,?,?,?,?,?)");
      $statement->execute(array($name,$category,$phone,$site,$address,$status));
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
        <h2><strong>Add a compagny</strong></h2>
            <div class="row">

                      <br>
                    <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">
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
                                <option value="to contact">To contact</option>
                                <option value="waiting for a response">Wating for a response</option>
                                <option value="refused">Refused</option>
                                <option value="accepted">Accepted</option>
                            </select>
                            <span class="help-inline"><?php echo $addError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Add</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Forward</a>
                       </div>
                    </form>
                     
                  
                  
                </div>
            </div>   
        </body>
    </html>