<?php
include "../db.php";

$message = "";

if (isset($_POST['save'])) {
  $service_name = $_POST['service_name'];
  $description = $_POST['description'];
  $hourly_rate = $_POST['hourly_rate'];
  $is_active = $_POST['is_active'];

  
  if ($service_name == "" || $hourly_rate == "") {
    $message = "Service name and hourly rate are required!";
  } else if (!is_numeric($hourly_rate) || $hourly_rate <= 0) {
    $message = "Hourly rate must be a number greater than 0.";
  } else {
    $sql = "INSERT INTO services (service_name, description, hourly_rate, is_active)
            VALUES ('$service_name', '$description', '$hourly_rate', '$is_active')";
    mysqli_query($conn, $sql);

    header("Location: services_list.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Service</title>
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
      max-width: 600px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      margin-bottom: 20px;
      font-size: 28px;
    }
    .message {
      padding: 12px;
      margin-bottom: 20px;
      background: #fee;
      border-left: 4px solid #f44;
      color: #c33;
      border-radius: 4px;
      display: none;
    }
    .message.show {
      display: block;
    }
    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 8px;
      color: #555;
      font-weight: 600;
      font-size: 14px;
    }
    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-family: inherit;
      font-size: 14px;
      transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    textarea {
      resize: vertical;
      min-height: 100px;
    }
    button {
      margin-top: 25px;
      padding: 12px 30px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
      width: 100%;
    }
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(102, 126, 234, 0.4);
    }
    button:active {
      transform: translateY(0);
    }
  </style>
</head>
<body>
<div class="container">
  <?php include "../nav.php"; ?>

  <h2>Add Service</h2>
  <p class="message <?php echo !empty($message) ? 'show' : ''; ?>"><?php echo $message; ?></p>

  <form method="post">
    <label>Service Name*</label>
    <input type="text" name="service_name" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Hourly Rate (₱)*</label>
    <input type="text" name="hourly_rate" required>

    <label>Active?</label>
    <select name="is_active">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>

    <button type="submit" name="save">Save Service</button>
  </form>
</div>
</body>
</html>
