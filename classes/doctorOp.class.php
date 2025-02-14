<?php

class DoctorOp extends Conn{
  protected function insertRatiba($did,$hid,$rdate,$sTime,$eTime){
    $sql="INSERT INTO RATIBA(did,hid,rdate,s_time,e_time) 
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
  protected function getDocDetails($dname,$dpw){
    $sql="SELECT dpassword FROM docotordetails WHERE dname=:dname";
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindParam('dname',$dname);
    if($stmt->execute()){
      echo "Details were obtained";
      $dpassword=$stmt->fetchAll(PDO::FETCH_ASSOC);
      if($dpw===$dpassword[0]['dpassword']){
        $sql2="SELECT * FROM doctordetails where dname=:dname AND dpassword=:dpw";
        $stmt1=$this->connect()->prepare($sql2);
        $stmt->bindParam('dname',$dname);
        $stmt->bindParam('dpw',$dpw);
        if($stmt->execute()){
          echo "Log in was succesful";
        }else{
          echo "Log in was unsuccesfull";
        }
      }else {
        echo "Password verification failed";
      }
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}