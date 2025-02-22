<?php
class ReportnGraphs extends Conn{
  protected function getDocReqCount(){
    $sql='SELECT d.dname ,drc.reqCount FROM doctorrequestcount AS drc INNER JOIN doctordetails AS d ON(drc.did=d.did ';
    $stmt=$this->connect()->prepare($sql);
    if($stmt->execute()){
      $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
  }
}