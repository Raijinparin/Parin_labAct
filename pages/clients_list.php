<?php
include __DIR__ . '/../db.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Clients List</title>
  <style>
    table{ border-collapse: collapse; width: 100%; max-width: 900px; margin: 12px auto; background: #fff; border-radius:8px; overflow:hidden; }
    th, td{ padding: 12px 14px; text-align: left; border-bottom: 1px solid #eee; }
    th{ background:#f7f9fb; font-weight:600; }
    a.button{ display:inline-block; padding:8px 12px; background:#4e73df; color:#fff; border-radius:6px; text-decoration:none; }
    .actions a{ margin-right:8px; color:#4e73df; text-decoration:none; }
    .container{ width:100%; max-width:1100px; margin:20px auto; padding:0 16px; }
  </style>
</head>
<body>
<?php include __DIR__ . '/../nav.php'; ?>
<div class="container">
  <h2>Clients</h2>
  <p><a class="button" href="clients_add.php">Add Client</a></p>

  <?php
  $res = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
  if(!$res){ echo '<p style="color:red">DB error.</p>'; }
  else{
    if(mysqli_num_rows($res) == 0){
      echo '<p>No clients yet.</p>';
    } else {
      echo '<table><thead><tr><th>#</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Actions</th></tr></thead><tbody>';
      while($row = mysqli_fetch_assoc($res)){
        $id = $row['client_id'];
        echo '<tr>';
        echo '<td>' . htmlspecialchars($id) . '</td>';
        echo '<td>' . htmlspecialchars($row['full_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
        echo '<td class="actions">';
        echo '<a href="clients_edit.php?id=' . urlencode($id) . '">Edit</a>';
        echo ' | <a href="clients_delete.php?id=' . urlencode($id) . '" onclick="return confirm(\'Delete this client?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
      }
      echo '</tbody></table>';
    }
  }
  ?>
</div>
</body>
</html>
