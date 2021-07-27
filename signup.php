<?php
    
  require '../connections/connection.php';

  $message = "";

  if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $sql = 'INSERT INTO users( name, email, password) VALUES( :name, :email, :pass)';
    $statement = $connection->prepare($sql);

    
    if ($statement->execute([ ':name' => $name, ':email' => $email, ':pass' => $password])) {
      $message = 'Account Registered Successfully.';
    }
  }


  $sql = 'SELECT * FROM users';

  $statement = $connection->prepare($sql);

  $statement->execute();

  $lists = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body {
    padding-left: 200px;
    padding-right: 200px;
    padding-top: 50px;

  }
</style>
<body>
    <?php if(!empty($message)): ?>
    <div class="alert alert-success">
      <?= $message; ?>
    </div>
  <?php endif; ?>
    <h1>Register </h1>

    <form method="post">

    <div class="form-group">
      <input type="text" class="form-control input-lg" id="name" placeholder="Username " name="name"/>
    </div>

    <div class="form-group">
      <input type="email" class="form-control input-lg" id="email" placeholder="Email " name="email"/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password"/>
    </div>
    
    <button type="submit" class="btn btn-light">Register</button>
    <p>
        Already have an account? <a href="login.php">Sign In </a>
    </p >  
    

  </form>
</body>
</html>