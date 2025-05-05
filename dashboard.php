<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <div class="sidebar">
    <h2>Makeup Studio</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="rezervime.php">Rezervo</a></li>
        <li><a href="termine.php">Termine</a></li>
        <li><a href="index.php">Dil </a></li>
    </ul>
  </div>

  <div class="main-content">
    <h1 style="color:rgb(199, 85, 189);">Dashboard</h1>
    <div class="cards">
      
      <?php
    include "db.php";

      $sql = "SELECT * FROM dashboard";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '
              <div class="card">
                <h3>📦 Produkte Aktive</h3>
                <p>' . $row["produkte_aktive"] . '</p>
              </div>
              <div class="card">
                <h3>📈 Stoku Total</h3>
                <p>' . $row["stoku_total"] . '</p>
              </div>
              <div class="card">
                <h3>🕒 Rezervime Aktive</h3>
                <p>' . $row["rezervime_aktive"] . '</p>
              </div>
              <div class="card">
                <h3>⚙️ Porosi në Proces</h3>
                <p>' . $row["porosi_ne_proces"] . '</p>
              </div>
              <div class="card">
                <h3>💶 Rezervime Mujore</h3>
                <p>' . $row["rezervime_mujore"] . '€</p>
              </div>
              <div class="card">
                <h3>🆕 Rezervimet e Reja</h3>
                <p>' . $row["rezervimet_e_reja"] . '</p>
              </div>
              ';
          }
      } else {
          echo "Nuk ka të dhëna për t'u shfaqur.";
      }

      $conn->close();
      ?>
      
    </div>
  </div>

  <?php include('components/footer.php') ?>
</body>
</html>
