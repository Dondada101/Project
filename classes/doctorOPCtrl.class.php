<?php

class DoctorOpCtrl extends DoctorOp{
 private $uname;
 private $dpw;
 public function __construct($param)
 {
  $this->uname=isset($param['dName'])? $param['dName']:null;
  $this->dpw=isset($param['dpw']) ? $param['dpw']:null;
 }
 public function verifyDoctor(){
  
 }
}