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
    $stmt=$this->connect()->prepare("SELECT * FROM hospitals");
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
}