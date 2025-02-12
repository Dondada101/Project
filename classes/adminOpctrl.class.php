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
   $this->dname=$params['dname'];
   $this->demail=$params['demail'];
   $this->dpw=$params['dpw'];
   $this->sname=$params['sname'];
   $this->ssname=$params['ssname'];
   $this->hname=$params['hname'];
   $this->hlvl=$params['hlvl'];
   $this->hid=$params['hid'];
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