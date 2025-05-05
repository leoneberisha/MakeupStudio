<!DOCTYPE html>
<html>
    <head>
        <title>Log in form</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body class="main">
        <div class="LogIn">
            <h1>Log in</h1><br>
            <form id="loginForm" action="" method="post">
                <label for="user">Përdoruesi: </label>
                <input type="text" id="user" name="user" required>
                <br><br>
                <label for="pass">Fjalëkalimi:</label>
                <input type="password" id="pass" name="pass" required>
                <br><br>
                <button type="submit" name="login">Log in</button><br><br>
                <a href="signin.php" style="text-decoration: none;">
                    <button type="button">Sign in</button>
                </a>
            </form>
            <p id="message">
                <?php
                session_start();
                include('db.php');

                if (isset($_POST['login'])) {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $message = "";

                    
                    $sql = "SELECT * FROM login WHERE user='$username'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        // Kontrollo fjalëkalimin
                        if (password_verify($password, $row['pass'])) {
                            $_SESSION['user'] = $username;
                            header("Location: dashboard.php"); 
                        } else {
                            echo "<script>alert('Perdoruesi ose fjalëkalimi është i gabuar.');</script>";
                        }
                    } else {
                        echo "<script>alert('Ky përdorues nuk ekziston.');</script>";
                    }

                    echo $message;
                }
                ?>

<?php
include('db.php');

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']); 

    $sql = "DELETE FROM rezervime WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Rekordi u fshi me sukses!'); window.location.href='terminet.php';</script>";
    } else {
        echo "Gabim gjatë fshirjes: " . $conn->error;
    }
}
?>

            </p>
        </div>
    </body>
</html>
