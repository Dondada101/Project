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
  public function __construct($dName=null,$dEmail=null,$dPassword=null,$specialization=null,$sspecialization=null,$hname=null,$hlvl=null)
  {
    if($dName!==null&&$dEmail!==null&&$dPassword!==null&&$specialization!==null&&$sspecialization!==null){
      $this->dname=$dName;
      $this->demail=$dEmail;
      $this->dpw=$dPassword;
      $this->sname=$specialization;
      $this->ssname=$sspecialization;
    }
    if($hname!==null&& $hlvl!==null){
      $this->hname=$hname;
      $this->hlvl=$hlvl;
    }
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
public function addHospitalDetails(){
  $this->addHospitalDetails($this->hname,$this->hlvl);
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