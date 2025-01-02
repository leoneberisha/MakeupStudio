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

