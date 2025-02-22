<?php
require 'classes/conn.class.php';
require 'classes/adminOp.class.php';
require 'classes/reportsngraphs.class.php';
$jsonData=new ReportnGraphs();
$jsonData->saveToJsonFile();
$hospitals=new AdminOp();
$data=$hospitals->getHospital();
?>
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
      <p><a href="" id="homeLink">Home</a></p>
      <p><a href="" id="aLink">Analytics</a></p>
      
    </div>
    <div id="content">
      <div class="navBar" id="navBar">
        <a href="" id="dLink"><p>Doctors</p></a>
        <a href=""><p>User</p></a>
        <a href="" id="sLink"><p>Specialization</p></a>
        <a href=""><p>Appointments</p></a>
        <a href="" id="hLink"><p>Hospitals</p></a>
      </div>
      
      <div class="formDoctor" id="formDoctor">
      <h3>Doctor</h3>
      <form onsubmit="dDetails(event)">
        <input type="text" name="dname" id="dName" placeholder="Enter doctor name">
        <input type="email" name="dname" id="dEmail" placeholder="Enter doctor Email">
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
        <button type="submit">Insert</button>
      </form>
      </div>
      <div class="hidden formHospitals" id="formHospitals">
      <h3>Hospital</h3>
      <form onsubmit="hDetails(event)">
        <input type="text" name="hname" id="hname" placeholder="Hospital Name">
        <input type="text" name="hlvl" id="hlvl" placeholder="Hospital Level">
        <button type="submit">Insert</button>
      </form>
      <div class="htable">
      <table id="results" class="ht">
       <thead> 
        <tr><th class="hidden">ID</th> <th>Name</th> <th>Level</th><th></th><th></th> </tr> 
      </thead>
       <tbody> 
        </tbody>
        <?php foreach($data AS $row): ?>
        <tr>  
        <th class="hidden" data-value=" <?php echo $row['hid']; ?>"> <?php echo $row['hid']; ?></th>    
        <th> <?php echo $row['hname']; ?></th>
        <th><?php echo $row['hlvl']; ?></th>
        <tH><button id="delete" onclick="delHos(this)">Delete</button></tH>
        <th><button id="update">Update</button></th>
        </tr>
        
        <?php endforeach; ?>
       </table> 
       </div>
      </div>
      <div class="hidden formSpecialization" id="formSpecialization">
      <h3>Specialization</h3>
      <form action="">
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
      <div class="mychart hidden" id="mc">
    <div class="chartTypes">
      <p>Doctors</p>
    <button onclick="setChartType('doughnut')" class="mcbtn">Pie Chart</button>
    <button onclick="setChartType('bar')" class="mcbtn">Bar</button>
    </div>
  <canvas id="myChart"></canvas>
  </div>
  <div class="mychartt hidden" id="mc1">
    <div class="chartTypes">
    <p>Hospital</p>
  <button onclick="setChartType1('doughnut')" class="mcbtn">Pie Chart</button>
  <button onclick="setChartType1('bar')" class="mcbtn">Bar</button>
    </div>
  <canvas id="myChart1"></canvas>
  </div>
    </div>
    <div id="footer"></div>
  </div>
  <script src="jss/admin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jss/analytic.js"></script>
</body>
</html>