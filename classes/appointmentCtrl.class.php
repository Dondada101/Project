<?php
require 'ignore.php';
class AppointmentCtrl extends Appointment{
  private $uid;
  private $did;
  private $rid;
  private $hid;
  private $dname;
  private $demail;
  private $adate;
  private $astart;
  private $aend;
  private $hname;
  private $uname;
  public function __construct($param)
  {
    $this->did=isset($param['did']) ? $param['did'] : null;
    $this->uid=isset($param['uid']) ? $param['uid'] : null;
    $this->rid=isset($param['rid']) ? $param['rid'] : null;
    $this->hid=isset($param['hid']) ? $param['hid'] : null;
    $this->dname=isset($param['dname']) ? $param['dname'] : null;
    $this->demail=isset($param['demail']) ? $param['demail'] : null;
    $this->adate=isset($param['adate']) ? $param['adate'] : null;
    $this->astart=isset($param['astart']) ? $param['astart'] : null;
    $this->aend=isset($param['aend']) ? $param['aend'] : null;
    $this->uname=isset($param['uname']) ? $param['uname'] : null;
    $this->hname=isset($param['hname']) ? $param['hname'] : null;
  }
  public function makeAppointment(){
    $sendEmail= new Ignore();
    $this->updateStatus($this->did,$this->hid,$this->rid,$this->uid);
    $sendEmail->appointmentDocNotification($this->demail,$this->dname,$this->adate,$this->astart,$this->aend,$this->uname,$this->hname);
  }
}