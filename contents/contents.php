<?php
require 'classes/conn.class.php';
require 'adminOp.class.php';
class contents{
  public function navBar(){
    ?>
    <div class="navbar">
      <div id="logo">
      <h7>iCheck</h7>
      </div>
      <div id="pages">
    <ul>
      <!-- <li><a href="">Home</a></li>
      <li><a href="">Home</a></li>
      <li><a href="">Home</a></li>
      <li><a href="">Home</a></li> -->
    </ul>
    </div>
    
    
    <form action="" method="POST">
    <div id="search" class="box"><input id="search1" type="text" placeholder="Search Here" name="search">
    <a href="">
    <i class="fas fa-search" id="searchbtn"></i>
    </a>
  </div>
  </form>
  <div id="pages">
    <ul>
      <!-- <li><a href="">Home</a></li>
      <li><a href="">Home</a></li>
      <li><a href="">Home</a></li>
      <li><a href="">Home</a></li> -->
      <div class="logout"> 
                <p> <a href="./logout.php">log Out</a></p>
                <i class="fas fa-user" id="loginbtn"></i>
                <a href="./message.php"><i class=" fas fa-solid fa-message"></i></a>
            </div>
    </ul>
    </div>
    </div>
    <?php 
  }
  public function contentPage(){
    $ap=new AdminOp();
    $data1=$ap->getFreeAppointments();
    ?> 
    <div class="contentPage htable">
    <!-- <table id="results" class="ht">
       <thead> 
        <tr> <th>Name</th> <th>Level</th> </tr> 
      </thead>
       <tbody>  -->
        <!-- Results will be displayed here --> 
       <!--  </tbody>
       </table> -->
       <div id="grids">
               <div id="grid1"><a href="#" id="grd1link">Appoinments</a></div>
       <div id="grid2">Services</div>
       <div id="grid3">Grid3</div>
       <div id="grid4">Grid4</div>
       <div id="grid5">Grid5</div>
       <div id="grid6">Alert</div>
       </div>
       <div id="appointmentResult" class="hidden">
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
    </div>
    <?php 
  }
  public function about(){
    ?>
    <div class="about">
    <h4>@Copyright</h4>
    </div>
    <?php 
  }
}
spl_autoload_register();