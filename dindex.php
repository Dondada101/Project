<?php
require 'classes/conn.class.php';
require 'classes/adminOp.class.php';
require 'classes/doctorOp.class.php';
require 'classes/doctorOPCtrl.class.php';
$hospital = new AdminOp();
$data = $hospital->getHospital();
// var_dump($data);
session_start();
$userid=$_SESSION['userid'];
$rDetails=new DoctorOp();
$data1 = $rDetails->getRatiba($userid);
if(isset($userid)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows&family=Jaro:opsz@6..72&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin.css">
  <script src="https://kit.fontawesome.com/333c1941e5.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
  <title>Doctor Module</title>
</head>
<body>
  <div class="container">
    <div id="header">
      <div class="doctorDetails">
        <p><?php echo $_SESSION['dname']?></p>
        <p>@<?php echo $_SESSION['demail']?></p>
      </div>
    </div>
    <div id="navbar">
    <div class="logo">
      <p>ICheck Ratiba</p>
      </div>
      <div class="ratiba">
        <a href="">Insert </a>
        <a href="includes/logout.php?type=doc">log Out</a>
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
        <option id="place" value="<?php echo htmlspecialchars($row['hname']); ?>">
            <?php echo htmlspecialchars($row['hname']); ?>
        </option>
        <?php echo "<!-- value='" . htmlspecialchars($row['hname']) . "' -->"; ?>
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
        <button class="refresh"><i class="fa-solid fa-arrows-rotate"></i></button>
      <table id="results" class="ht">
       <thead> 
        <tr> <th>Name</th>
         <th>Level</th>
        <th>Level</th>
        <th>Date</th>
        <th>Start</th>
        <th>End</th>
        <th>Status</th>
        </tr> 
      </thead>
       <tbody> 
        </tbody>
        <?php foreach($data1 AS $row): ?>
        <tr>  
        <th data-value=" <?php echo $row['rid']; ?>"> <?php echo $row['rid']; ?></th>    
        <th> <?php echo $row['hname']; ?></th>
        <th><?php echo $row['hlvl']; ?></th>
        <th> <?php echo $row['rdate']; ?></th>
        <th><?php echo $row['s_time']; ?></th>
        <th> <?php echo $row['e_time']; ?></th>
        <th>
        <?php
        if(isset($row['status1'])){
          if($row['status1'] === false){
        
            echo "Open";
          }else if($row['status1'] === true){
            echo "Booked";
          }
        }else{
          echo "Not set";
        }
        ?>
        </th>
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

<!-- <td><?php echo $row['status']; ?></td>
<?php echo $row['status1'] === false ? 'false' : ($row['status1'] === true ? 'true' : 'Not set'); ?>
</td>
<td><?php echo $row['status1'] === false ? 'false' : ($row['status1'] === true ? 'true' : 'Not set'); ?></td> -->
<!-- ternary operators -->