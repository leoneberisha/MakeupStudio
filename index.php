<html>
    <head>
        <title>Log in form</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body class="main">
        <div class="LogIn">
        <h1>Log in</h1><br>
        <form id="loginForm" action="dashboard.html" method="post">
        <label for="user">Perdoruesi: </label>
        <input type="text" id="user" name="user">
         <br><br>
        <label for="pass">Fjalekalimi:</label>
        <input type="password" id="pass" name="pass">
        <br><br>
     <button type="submit">Log in</button><br><br>
     <a href="signin.php" style="text-decoration: none;">
      <button type="button">Sign in</button>
  </a>
  
        </form>
        <p id="message"></p>
        </div>
        <?php
include('db.php'); 

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE user='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kontrollo fjalëkalimin
        if (password_verify($password, $row['pass'])) {
            $_SESSION['user'] = $username;
            echo "Login i suksesshëm! Mirësevjen, " . $_SESSION['user'];
        } else {
            echo "Fjalëkalimi është i gabuar.";
        }
    } else {
        echo "Ky përdorues nuk ekziston.";
    }
} 
?>
    </body>
</html>