<?php
require 'classes/conn.class.php';
require 'classes/adminOp.class.php';
$hospital = new AdminOp();
$data = $hospital->getHospital();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows&family=Jaro:opsz@6..72&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin.css">
  <title>Doctor Module</title>
</head>
<body>
  <div class="container">
    <div id="header"></div>
    <div id="navbar">
    <div class="logo">
      <p>ICheck Ratiba</p>
      </div>
      <div class="ratiba">
        <a href="">Insert </a>
        <a href="">Read</a>
      </div>
    </div>
    <div id="content">
      <h2></h2>
     
      <div class="formRatiba">
        <h3>My Ratiba</h3>
      <form action="">
        <input type="text" id="id" class="hidden">
        <label for="hospital">Choose a hospital:</label>
        <select id="hospital" name="hospital">
            <?php foreach ($data as $row): ?>
            <option value="<?php echo $row['hname']; ?>"><?php echo $row['hname']; ?></option>
            <?php endforeach; ?>
        </select>
        <select name="" id="">
          <option value="">Select Date</option>
          <option value="">h2</option>
          <option value="">h3</option>
          <option value="">h4</option>
          <option value="">h5</option>
        </select>
        <select name="" id="">
          <option value="" type="datetime-local">Start-time</option>
        </select>
        <select name="" id="">
          <option value="" type="datetime-local">End-time</option>
        </select>
        <button>Add</button>
        </form>
      </div>
    </div>
    <div id="footer"></div>
  </div>
</body>
</html>