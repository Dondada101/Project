<?php
class AppointmentCtrl extends Appointment{
  protected function updateStatus($did,$hid,$rid,$uid){
    $sql='SELECT * FROM ratiba WHERE rid=:rid';
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindParam('rid',$rid);
    if($stmt->execute()){
      $rDetails=$stmt->fetchAll(PDO::FETCH_ASSOC);
      $status=$rDetails[0]['astatus'];
      if($status===false){
        $sql1='UPDATE ratiba SET astatus=true WHERE rid=:rid';
        $stmt1=$this->connect()->prepare($sql1);
        $stmt1->bindParam('rid',$rid);
        if($stmt1->execute()){
          echo "Update was succesfull";
          $sql2='INSERT INTO appointments(did,userid) VALUES (:did,:userid)';
          $stmt2=$this->connect()->prepare($sql2);
          $stmt2->bindParam('did',$did);
          $stmt2->bindParam('userid',$uid);
          if($stmt2->execute()){
            echo "records inserted succesfully";
          }else{
            echo "records were not inserted succesfully";
          }
        }else{
          echo "Update failed";
        }
      }else{
        echo "status is already set to true";
      }
    }else{
      echo "Statement failed to execute"
    }
  }
}