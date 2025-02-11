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
}