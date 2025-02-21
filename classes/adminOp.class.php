<?php
class AdminOp extends Conn {
  protected function insertDoctorDetails($dname,$demail,$dPassword,$sname,$ssname){
    $stmt=$this->connect()->prepare("INSERT INTO doctordetails(dname,demail,dpassword,dspecialization,dsspecialziation) VALUES (:dname,:demail,:dpw,:dspec,:dsspec)");
    $stmt->bindParam(':dname',$dname);
    $stmt->bindParam(':demail',$demail);
    $stmt->bindParam(':dpw',$dPassword);
    $stmt->bindParam(':dspec',$sname);
    $stmt->bindParam(':dsspec',$ssname);
    if($stmt->execute()){
      echo "Doctor Details were inserted succesfully";
    }else{
      echo "Error: " . $stmt->errorInfo()[2];
    }
  }

  protected function insertHospitalDetails($hname,$hlvl){
    $stmt=$this->connect()->prepare("INSERT INTO hospitals(hname,hlvl) VALUES (:hname,:hlvl)");
    $stmt->bindParam(':hname',$hname);
    $stmt->bindParam(':hlvl',$hlvl);
    if($stmt->execute()){
      echo "Hospital Details were inserted succesfully";
    }else{
      echo "Error: " . $stmt->errorInfo()[2];
    }
  }
  public function getHospital(){
    $stmt=$this->connect()->prepare("SELECT * FROM hospitals ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  protected function deleteHospital($hid){
    $sql="DELETE FROM hospitals WHERE hid=:hid";
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindParam('hid',$hid);
    if($stmt->execute()){
      echo "Record deleted succesfully";
    }else{
      echo "Record not deleted an error occured";
    }
  }
  public function getFreeAppointments(){
    $sql='SELECT  d.dname AS dname,d.dspecialization AS specialization,d.dsspecialziation AS subspecialization,d.did AS did,d.demail AS demail, h.hname AS hospital,h.hlvl AS hlevel,h.hid AS hid, r.s_time AS astart,r.rdate AS adate,r.e_time AS aend ,r.rid AS rid FROM ratiba AS r 
        INNER JOIN hospitals AS h ON(r.hid=h.hid)
        INNER JOIN doctordetails AS d ON(r.did=d.did)
        WHERE r.astatus=false';
     $stmt=$this->connect()->prepare($sql);
     if($stmt->execute()){
     // echo "Details retrieved";
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }  else{
      echo "Encounterd an error";
     } 
  }
}