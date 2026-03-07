<?php
include "../db.php";



if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];


  // Soft delete (set is_active to 0)
  mysqli_query($conn, "UPDATE services SET is_active=0 WHERE service_id=$delete_id");


  header("Location: services_list.php");
  exit;
}



$result = mysqli_query($conn, "SELECT * FROM services ORDER BY service_id DESC");
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Services</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 20px;
    }
    .container {
      max-width: 1000px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      margin-bottom: 25px;
      font-size: 28px;
    }
    .add-btn {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 20px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .add-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(102, 126, 234, 0.4);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 15px;
      text-align: left;
      font-weight: 600;
      font-size: 14px;
    }
    td {
      padding: 12px 15px;
      border-bottom: 1px solid #eee;
      font-size: 14px;
    }
    tr:hover {
      background: #f9f9f9;
    }
    a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s;
    }
    a:hover {
      color: #764ba2;
      text-decoration: underline;
    }
    .status-active {
      color: #28a745;
      font-weight: 600;
    }
    .status-inactive {
      color: #dc3545;
      font-weight: 600;
    }
  </style>
</head>
<body>
<div class="container">
  <?php include "../nav.php"; ?>

  <h2>Services</h2>

  <p>
    <a href="services_add.php" class="add-btn">+ Add Service</a>
  </p>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Rate</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row['service_id']; ?></td>
        <td><?php echo $row['service_name']; ?></td>
        <td>₱<?php echo number_format($row['hourly_rate'],2); ?></td>

        <td>
          <span class="<?php echo ($row['is_active'] == 1) ? 'status-active' : 'status-inactive'; ?>">
            <?php echo ($row['is_active'] == 1) ? 'Active' : 'Inactive'; ?>
          </span>
        </td>

        <td>
          <a href="services_edit.php?id=<?php echo $row['service_id']; ?>">Edit</a>

          <?php if ($row['is_active'] == 1) { ?>
            |
            <a href="services_list.php?delete_id=<?php echo $row['service_id']; ?>"
               onclick="return confirm('Deactivate this service?')">
               Deactivate
            </a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>