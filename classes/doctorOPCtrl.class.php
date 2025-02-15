<?php

class DoctorOpCtrl extends DoctorOp{
 private $dname;
 private $dpw;
 private $did;
 private $stime;
 private $etime;
 private $rdate;
 private $place;
 public function __construct($param)
 {
  $this->dname=isset($param['dName'])? $param['dName']:null;
  $this->dpw=isset($param['dpw']) ? $param['dpw']:null;
  $this->place=isset($param['place']) ? $param['place']:null;
  $this->rdate=isset($param['rdate']) ? $param['rdate']:null;
  $this->stime=isset($param['stime']) ? $param['stime']:null;
  $this->etime=isset($param['etime']) ? $param['etime']:null;
  $this->did=isset($param['did']) ? $param['did']:null;
 }
 public function verifyDoctor(){
  $this->getDocDetails($this->dname,$this->dpw);
 }
 public function insertDocRatiba(){
  $this->insertDocRatiba($this->did,$this->place,$this->rdate.$this->stime,$this->etime);
 }
}