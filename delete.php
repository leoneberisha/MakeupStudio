<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Siguro që ID-ja është numër

    // Përgatit query për fshirje
    $sql = "DELETE FROM rezervime WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Rekordi u fshi me sukses!'); window.location.href='termine.php';</script>";
            
            exit;
        } else {
            $_SESSION['message'] = "Gabim gjatë fshirjes: " . $stmt->error;
            
            exit;
        }
    } 
} else {
    $_SESSION['message'] = "Kërkesë e pavlefshme.";
    header("Location: dashboard.php");
    exit;
}
?>
echo "<script>alert('Rekordi u fshi me sukses!'); window.location.href='terminet.php';</script>";