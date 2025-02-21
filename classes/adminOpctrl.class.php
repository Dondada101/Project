<?php
require 'ignore.php';
class AdminOpCtrl extends AdminOp{
  private $dname;
  private $demail;
  private $dpw;
  private $sname;
  private $ssname;
  private $hname;
  private $hlvl;
  private $hid;
  public function __construct($params)
  {
   $this->dname=isset($params['dname']) ? $params['dname']:null;
   $this->demail=isset($params['demail']) ? $params['demail']:null;
   $this->dpw=isset($params['dpw']) ? $params['dpw']:null;
   $this->sname=isset($params['sname'])? $params['sname']:null;
   $this->ssname=isset($params['ssname'])? $params['ssname']:null;
   $this->hname=isset($params['hname']) ? $params['hname']:null;
   $this->hlvl=isset($params['hlvl'])? $params['hlvl']:null;
   $this->hid=isset($params['hid'])? $params['hid']:null;
  }
  
  public function addDoctorDetails(){
    $sendPw=new Ignore();
    if($this->emptyEmail()==false){
      header("location: ../login.php?error=emptyfields");
      exit();
  }

  $this->insertDoctorDetails($this->dname,$this->demail,$this->dpw,$this->sname,$this->ssname);
  $sendPw->sendDoctorPassword($this->demail,$this->dname,$this->dpw);
  }
  public function addHospitalDetails(){
    $this->insertHospitalDetails($this->hname,$this->hlvl);
  }
  public function deleteHospitalDetails(){
    $this->deleteHospital($this->hid);
  }
  private function emptysu( ){
    $result=false;
    if(empty($this->demail) || empty($this->dpw)){
        $result=false;
    }
    else{
        $result= true;
    }
    return $result;
    
}

private function emptyEmail( ){
    $result=false;
    if(empty($this->demail)){
        $result=false;
    }
    else{
        $result= true;
    }
    return $result;
    
}
}