<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows&family=Jaro:opsz@6..72&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin.css">
  <title>Admin</title>
</head>
<body>
  <div class="container">
    <div id="header">
      <p><a href="">Read</a></p>
      <p><a href="">Insert</a></p>
      <p><a href="">Update</a></p>
      <p><a href="">Delete</a></p>
    </div>
    <div id="navbar">
      <div class="logo">
      <p>ICheck</p>
      </div>
      <!-- <div class="output">
        <p><a href="">Analytics</a></p>
        <p><a href="">Report</a></p>
      </div> -->
    </div>
    <div id="content">
      <div class="navBar">
        <a href=""><p>Doctors</p></a>
        <a href=""><p>User</p></a>
        <a href=""><p>Appointments</p></a>
        <a href=""><p>Hospitals</p></a>
      </div>
      <div class="form">
      <h3>Doctor</h3>
      <form action="">
        <input type="text" name="dname" id="" placeholder="Enter doctor name">
        <input type="text" name="dname" id="" placeholder="Enter doctor Email">
        <label for="specialization">Specialization:</label>
        <select id="specialization" name="specialization" onchange="updateSubcategories()">
        <option value="">Select a Specialization</option>
            <option value="ophthalmologists">Ophthalmologists</option>
            <option value="oncologists">Oncologists</option>
            <option value="neurologists">Neurologists</option>
            <option value="paediatricians">Paediatricians</option>
        </select>
        <label for="sub-specialization">Sub-specialization:</label>
        <select id="sub-specialization" name="sub-specialization">
        <option value="">Select a Sub-Specialization</option>
        </select>
        <button>Insert</button>
      </form>
      </div>
    </div>
    <div id="footer"></div>
  </div>
  <script src="jss/admin.js"></script>
</body>
</html>