<?php
class AdminOp extends Conn{
  private $dPassword;

  protected function generateCode(){
      $this->dPassword =bin2hex(random_bytes(10 / 2));
}
}