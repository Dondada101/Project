<?php
class AdminOp extends Conn{
  private $dPassword;
  private $sid;
  private $ssid;

  protected function generatePw(){
      $this->dPassword =bin2hex(random_bytes(20 / 2));
}
  protected function insertSpecialization($sname){

  }
  protected function insertDoctorDetails($dPassword,$demail,$dname,$sid,$ssid){

  }
}