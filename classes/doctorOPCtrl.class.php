<?php

class DoctorOpCtrl extends DoctorOp{
 private $dname;
 private $dpw;
 public function __construct($param)
 {
  $this->dname=isset($param['dName'])? $param['dName']:null;
  $this->dpw=isset($param['dpw']) ? $param['dpw']:null;
 }
 public function verifyDoctor(){
  $this->getDocDetails($this->dname,$this->dpw);
 }
}