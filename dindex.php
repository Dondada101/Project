<?php
require 'classes/conn.class.php';
require 'classes/adminOp.class.php';
$hospital = new AdminOp();
$data = $hospital->getHospital();
session_start();
if(isset($_SESSION['userid'])){
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
        <a href="logout.php">log Out</a>
      </div>
    </div>
    <div id="content">
      <h2></h2>
     
      <div class="formRatiba">
        <h3>My Ratiba</h3>
      <form  onsubmit="addSchedule(event)">
        <input type="text" id="did" class="hidden" value="<?php echo $_SESSION['userid']?>">
        <label for="hospital">Choose a hospital:</label>
        <select id="hospital" name="hospital">
            <?php foreach ($data as $row): ?>
            <option id="place" value="<?php echo $row['hname']; ?>"><?php echo $row['hname']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="rDate">Select Date</label>
        <input type="date" id="rDate">
        <br>
        <label for="sTime">Start</label>
        <input type="time" id="sTime" >
        <label for="eTime">End</label>
        <input type="time" id="eTime" >
        <button type="submit">Add</button>
        </form>
      </div>
      <div class="htable" id="displayRatiba">
      <table id="results" class="ht">
       <thead> 
        <tr> <th>Name</th> <th>Level</th> </tr> 
      </thead>
       <tbody> 
        </tbody>
        <?php foreach($data AS $row): ?>
        <tr>  
        <th data-value=" <?php echo $row['hid']; ?>"> <?php echo $row['hid']; ?></th>    
        <th> <?php echo $row['hname']; ?></th>
        <th><?php echo $row['hlvl']; ?></th>
        <tH><button onclick="delHos(this)">Delete</button></tH>
        <th><button>Update</button></th>
        </tr>
        
        <?php endforeach; ?>
       </table> 
      </div>
    </div>
    <div id="footer"></div>
  </div>
  <script src="jss/doctor.js"></script>
</body>
</html>
<?php
}else{
  echo "NOt logged in";
  header('Location:doctorlogin.php');
}
?>


