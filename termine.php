<?php
// Përfshi skedarin që lidh me DB
include('db.php'); 

$sql = "SELECT * FROM `rezervime`";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

$reservations = [];
while ($row = $result->fetch_assoc()) {
    $reservations[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
  <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        background-color: #f4f4f4;
      
    }
    th {
        background-color:rgb(107, 97, 101);;
        color: #f4f4f4;
    }
    .no-data {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
    }
    .success-message {
        color: green;
        margin-bottom: 10px;
    }
  </style>
</head>
<body>
<?php include('components/header.php') ?>

  <div class="main-content">
    <h1 style="color:rgb(224, 55, 128);">Terminet</h1>

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p class='success-message'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>

    <?php if (!empty($reservations)) : ?>
        <table>
        <thead>
    <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Email</th>
        <th>Data</th>
        <th>Ora</th>
        <th>Lloji</th>
        <th>Ndrysho</th> 
        <th>Fshij</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($reservations as $row) : ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['booking_date']) ?></td>
            <td><?= htmlspecialchars($row['message']) ?></td>
            <td><?= htmlspecialchars($row['makeupType']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">
                    <button type="button" class="butoni">Edit</button>
                </a>
            </td>
            <td>
                <form method="POST" action="delete.php" onsubmit="return confirm('A jeni i sigurt që dëshironi ta fshini këtë rezervim?');">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                    <button type="submit" class="butoni">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    <?php else : ?>
        <p class="no-data">Nuk ka rezervime.</p>
    <?php endif; ?>
  </div>

  <?php include('components/footer.php') ?>
</body>
</html>
