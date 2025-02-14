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

}