<?php
require 'classes/conn.class.php';
require 'classes/adminOp.class.php';
require 'classes/doctorOp.class.php';
require 'classes/doctorOPCtrl.class.php';
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
    <div id="search" class="box hidden"><input id="search1" type="text" placeholder="Search Here" name="search">
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
                <p id="logout"> <a href="./logout.php">log Out</a></p>
                <p id="username"><?php echo $_SESSION['un']?></p>
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
    //print_r($_SESSION);
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
      <table id="results" class="ht">
       <thead> 
        <tr> 
          <th></th>
        <th>Location</th>
        <th>Doctor</th>
        <th>Specialization</th>
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
        <th>
              <button type="button" class="toggle-details" id="ddown"><i class="fa-solid fa-angle-down"></i></button>
        </th>
        <th data-value=" <?php echo $row['rid']; ?>" class="hidden"> <?php echo $row['rid']; ?></th> 
        <th class="hidden" data-value=" <?php echo $row['hid']; ?>"> <?php echo $row['hid']; ?></th> 
        <th class="hidden" data-value=" <?php echo $row['did']; ?>"> <?php echo $row['did']; ?></th>  
        <th class="hidden" data-value=" <?php echo $row['demail']; ?>"> <?php echo $row['demail']; ?></th>     
        <th> <?php echo $row['hospital']; ?></th>
        <th data-value="<?php echo $row['dname'];?>"><?php echo $row['dname']; ?></th>
        <th> <?php echo $row['specialization']; ?></th>
        <th data-value="<?php echo $row['adate'];?>"> <?php echo $row['adate']; ?></th>
        <th data-value=" <?php echo $row['astart']; ?>"><?php echo $row['astart']; ?></th>
        <th data-value=" <?php echo $row['aend']; ?>"> <?php echo $row['aend']; ?></th>
        <th class="hidden" data-value=" <?php echo $row['hospital']; ?>"> <?php echo $row['hospital']; ?></th> 
        <th class="hidden" data-value=" <?php echo $_SESSION['uid']?>"><?php echo $_SESSION['uid']?></th> 
        <th class="hidden" data-value=" <?php echo $_SESSION['un']?>"> <?php echo $_SESSION['un']?></th> 
        <th>
         <button onclick="initiateBooking(this)" id="book">Book</button>
        </th>
        </tr>
        <tr class="details hidden">
            <td colspan="8">
              <div>
                <p><span>Sub-specialization:</span>  <?php echo $row['subspecialization']; ?></p>
                <p><span>Hospital Level:</span>  <?php echo $row['hlevel']; ?></p>
              </div>
            </td>
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