<?php 
    include "../includes/conn.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"]))
{
    // $user = $_POST["username"];
    // $pass = MD5($_POST["password"]);

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $loginQuery = $mysql->prepare("select * from users where username=? and password=?");
    $loginQuery->bind_param("ss", $user, $pass);
    $loginQuery->execute();
    $loginQuery->store_result();

    if($loginQuery->num_rows > 0)
    {
    session_start();
    $_SESSION["username"] = $_POST["username"];
    header("Location: index.php");

    }
    else{

        echo "<div class=\"alert alert-danger\">";
        echo "<strong>Wrong username and/or password. </strong>";
        echo "</div>";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../includes/style.css" rel="stylesheet" id="css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <title>:: Minet - Login ::</title>
</head>
<body>
 
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="img/minet-logo.png" id="icon" alt="User Icon" />
    </div>

    <form action="#" method="post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>