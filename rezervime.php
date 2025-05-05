<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rezervo</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<?php include('components/header.php') ?>

  <div class="main-content">
    <div class="form-container">
      <h2>Rezervo Tani</h2>
      <form method="POST">
        <div class="form-group">
          <label for="name">Emri:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="booking_date">Data e Rezervimit:</label>
          <input type="date" id="booking_date" name="booking_date" required>
        </div>
        <div class="form-group">
          <label for="message">Ora:</label>
          <textarea id="message" name="message" rows="4"></textarea>
        </div>
        <div class="select-container">
            <label for="makeup-type">Zgjidh Llojin e Makeup-it:</label>
            <select id="makeupType" name="makeupType" required>
              <option value="" disabled selected>Zgjidh një opsion</option>
              <option value="bridal">Bridal</option>
              <option value="soft">Soft</option>
              <option value="simple">Simple</option>
              <option value="glamorous">Glamorous</option>
            </select>
          </div>
          
        <div class="form-group">
          <input type="submit" value="Dërgo Rezervimin">
        </div>
      </form>
    </div>
  </div>
  <?php
// Përfshi skedarin që lidh me DB
include('db.php'); 

// Kontrollo nëse është POST kërkesa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merr të dhënat nga formulari
    $name = $_POST["name"];
    $email = $_POST["email"];
    $booking_date = $_POST["booking_date"];
    $message = $_POST["message"];
    $makeupType = $_POST["makeupType"];
    
    
    // Pastrimi i të dhënave me real_escape_string për t'iu shmangur SQL Injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $booking_date = $conn->real_escape_string($booking_date);
    $message = $conn->real_escape_string($message);
    $makeupType = $conn->real_escape_string($makeupType);
 
    
    // Krijo query-n SQL
    $sql = "INSERT INTO rezervime (name, email, booking_date, message, makeupType) VALUES ('$name', '$email', '$booking_date','$message','$makeupType')";
    //echo $sql;
    // Ekzekuto query-n
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Rezervimi juaj u ruajt me sukses!');</script>"; 
    } else {
        // Shfaq gabimin nëse ka ndodhur një problem me query-n
      //  echo "gabim"
    }
}

// Mbyll lidhjen me DB
$conn->close();
?>
  <footer>
    <p>© 2024 Makeup Studio. Të gjitha të drejtat e rezervuara.</p>
    <p>Na kontaktoni: <a href="mailto:Sellma@makeupstudio.com">info@makeupstudio.com</a> | +383 44 123 456</p>
  </footer>
</body>
</html>
