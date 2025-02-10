<?php
class AdminOp extends Conn{
  protected function insertSpecialization($sname){

  }
  protected function insertDoctorDetails($dPassword,$demail,$dname,$sname,$ssname){
    $stmt=$this->connect()->prepare("INSERT INTO doctordetails(dname,demail,dpassword,dspecialization,dsspecialization) VALUES (:dname,:demail,:dpw,:dspec,:dsspec");
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
}