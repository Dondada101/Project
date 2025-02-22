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
  protected function getHosReqCount(){
    $sql='SELECT h.hname ,hrc.reqCount FROM hospitalrequestcount AS hrc INNER JOIN hospitals AS h ON(hrc.hid=h.hid ';
    $stmt=$this->connect()->prepare($sql);
    if($stmt->execute()){
      $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
  }
  public function saveToJsonFile() {
    $dataOne = $this->getDocReqCount();
    $dataTwo = $this->getHosReqCount();
    
    // Combine both data sets into a single associative array
    $combinedData = [
        "data1" => $dataOne,
        "data2" => $dataTwo
    ];
    
    // Encode combined data to JSON format
    $json_data = json_encode($combinedData);
    
    // Save JSON data to file
    file_put_contents('data.json', $json_data);
}
}
