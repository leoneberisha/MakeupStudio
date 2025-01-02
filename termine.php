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
  <title>Terminet</title>
  <link rel="stylesheet" href="dashboard.css">
  <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    .no-data {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
    }
  </style>
</head>
<body>
<?php include('components/header.php') ?>
  <div class="main-content">
    <h1 style="margin-top:60px; color: #89ABE3;">Rezervimet</h1>
    <?php if (!empty($reservations)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Data</th>
                    <th>Mesazhi</th>
                    <th>Lloji</th>
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
