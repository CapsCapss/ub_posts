<?php 
 session_start();
 session_destroy();

  include_once '../connections/Query.php';

  $queries = new Queries();

  $message = "";

  if (isset($_POST['email']) && isset($_POST['pass'])) {
    $message = $queries->readSingle($_POST['email'], $_POST['pass']);
}
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
    <h1> UB POST </h1>
    <form method="post">

    <div class="form-group">
      <input type="text" class="form-control input-lg" id="email" placeholder="Email " name="email"/>
    </div>

    <div class="form-group">
      <input type="password" class="form-control input-lg" id="pass" placeholder="Password" name="pass"/>
    </div>


    <button type="submit" class="btn btn-light">LOGIN</button> 
    <p>
        Don't have an account? <a href="signup.php">Sign Up </a>
    </p > 
  </form>
</body>
</html>