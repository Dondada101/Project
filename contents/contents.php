<?php
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
       <div id="grid1">Appoinments</div>
       <div id="grid2">Services</div>
       <div id="grid3">Grid3</div>
       <div id="grid4">Grid4</div>
       <div id="grid5">Grid5</div>
       <div id="grid6">Alert</div>
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