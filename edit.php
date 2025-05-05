<?php

include('db.php');

$id = $_GET['id'];

if (!$id) {
    die("ID e pavlefshme!");
}

$sql = "SELECT * FROM rezervime WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Rezervimi nuk u gjet!");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <div class="sidebar">
    <h2 style="color: white">Makeup Studio</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="rezervime.php">Rezervo</a></li>
        <li><a href="termine.php">Termine</a></li>
        <li><a href="index.php">Dil </a></li>
        </ul>
  </div>
    <style>
       

        h2 {
            text-align: center;
            color: #555;
            font-size: 28px;
        }

        form {
            width: 40%;
            height: 70%;
            margin: 40px auto;
            margin-top: 100px;
            padding: 20px;
            border-radius: 8px;
            background-color:rgb(255, 255, 255);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        form textarea {
            resize: none;
            height: 100px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #557AC7;;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #557AC7;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label for="name">Emri:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

        <label for="booking_date">Data e Rezervimit:</label>
        <input type="date" name="booking_date" value="<?= htmlspecialchars($row['booking_date']) ?>" required>

        <label for="message">Ora:</label>
        <textarea name="message" required><?= htmlspecialchars($row['message']) ?></textarea>

        <label for="makeupType">Lloji i Makeup-it:</label>
        <input type="text" name="makeupType" value="<?= htmlspecialchars($row['makeupType']) ?>" required>

        <a href="termine.php">
        <input type="submit" name="submit" value="Përditëso">
        </a>
    </form>
    
    <?php //pjesa EDIT
include('db.php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$booking_date = $_POST['booking_date'];
$message = $_POST['message'];
$makeupType = $_POST['makeupType'];

// Përditëso të dhënat në bazën e të dhënave
$sql = "UPDATE rezervime 
        SET name='$name', email='$email', booking_date='$booking_date', message='$message', makeupType='$makeupType' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Të dhënat u përditësuan me sukses!');</script>";   
} else {
    echo "Gabim gjatë përditësimit: " . $conn->error;
}

$conn->close();
?>

   
  <?php include('components/footer.php') ?>
</body>
</html>
