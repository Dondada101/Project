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
  public function __construct($hname=null,$hlvl=null,$dName=null,$dEmail=null,$dPassword=null,$specialization=null,$sspecialization=null)
  {
    if($dName!==null&&$dEmail!==null&&$dPassword!==null&&$specialization!==null&&$sspecialization!==null){
      $this->dname=$dName;
      $this->demail=$dEmail;
      $this->dpw=$dPassword;
      $this->sname=$specialization;
      $this->ssname=$sspecialization;
    }else if($hname!==null&&$hlvl!==null){
      $this->hname=$hname;
      $this->hlvl=$hlvl;
    }
    echo "hname in constructor: " . $this->hname . "<br>";
   echo "hlvl in constructor: " . $this->hlvl . "<br>";
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