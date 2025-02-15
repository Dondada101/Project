<?php

class DoctorOp extends Conn{
  protected function insertRatiba($did,$hname,$rdate,$sTime,$eTime){
    $sql1="SELECT hid FROM  hospitals WHERE hname=:hname";
    $stmt1=$this->connect()->prepare($sql1);
    $stmt1->bindParam('hname',$hname);
    if($stmt1->execute()){
      $hosDet=$stmt1->fetchAll(PDO::FETCH_ASSOC);
      $hid=$hosDet[0]['hid'];
    }
    

    $sql="INSERT INTO ratiba(did,hid,rdate,s_time,e_time) 
               VALUES (:did,:hid,:rdate,:stime,:etime)";
  $stmt=$this->connect()->prepare($sql);
  $stmt->bindParam('did',$did);
  $stmt->bindParam('hid',$hid);
  $stmt->bindParam('rdate',$rdate);
  $stmt->bindParam('stime',$sTime);
  $stmt->bindParam('etime',$eTime);

  if($stmt->execute()){
    echo "Details Inserted Successful";
  }else{
    echo "An error occured";
  }
  }
  public function getDocDetails($dname,$dpw){
    echo $dname." ".$dpw;
    $sql="SELECT dpassword FROM doctordetails WHERE dname=:dname";
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindParam('dname',$dname);
    if($stmt->execute()){
      echo "Details were obtained";
      $dpassword=$stmt->fetchAll(PDO::FETCH_ASSOC);
      if($dpw===$dpassword[0]['dpassword']){
        echo "Password verification was succesful";
        $sql2="SELECT * FROM doctordetails where dname=:dname AND dpassword=:dpw";
        $stmt1=$this->connect()->prepare($sql2);
        $stmt1->bindParam('dname',$dname);
        $stmt1->bindParam('dpw',$dpw);
        if($stmt1->execute()){
          echo "Log in was succesful";
          $user= $stmt1->fetchAll(PDO::FETCH_ASSOC);
          session_start();
            $_SESSION["userid"]=$user[0]["did"];
            $stmt1=null;
            exit();
        }else{
          echo "Log in was unsuccesfull";
          exit();
        }
      }else {
        echo "Password verification failed";
        exit();
      }
    }else{
      echo "Details were not obtained";
      exit();
    }
       
  }
}