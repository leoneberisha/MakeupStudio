<?php
include "db.php";
?>

<html>

<head>
    <title>Sign in</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="main">
<div class="LogIn">
        <h1>Sign in</h1><br>
        <form id="loginForm" method="post">
        <label for="user">Perdoruesi: </label>
        <input type="text" id="user" name="user">
         <br><br>
        <label for="pass">Fjalekalimi:</label>
        <input type="pass" id="pass" name="pass">
        <br><br>
        <button type="submit">Sign in</button> <br><br>
      <a href="login.php" style="text-decoration: none;">
      <button type="button">Log in</button>
  </a>
  <?php
include('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pass"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO login (user, pass) VALUES ('$username', '$password')";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('U regjistru me sukses!');</script>"; 
    } else {
        echo "Gabim: " . $conn->error;
    }
}
$conn->close();
?>

</body>
</html>
