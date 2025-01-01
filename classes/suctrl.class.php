<?php
class Suctrl extends Su{
    private $uname;
    private $email;
    private $pw;
    private $cpw;
    public function __construct($uname,$email,$pw,$cpw)
    {
        $this->uname=$uname;
        $this->email=$email;
        $this->pw=$pw;
        $this->cpw=$cpw;
    }
    public function signup(){
        
        if($this->emptysu()==false){
            header("location: ../index.php?error=emptyfields");
            exit();
        }
        if($this->invalidun()==false){
            header("location: ../index.php?error=Invalidusername");
            exit();
        }
        if($this->invalidemail()==false){
            header("location: ../index.php?error=invalidemail");
            exit();
        }
        if($this->pwmatch()==false){
            header("location: ../index.php?error=Password do not match");
            exit();
        }
        if($this->pwlength()==false){
            header("location: ../index.php?error=Password is below 8characters");
            exit();
        } 
        if($this->pwcheck()==false){
            header("location: ../index.php?error=Password must contain letters and numbers");
            exit();
        }
        if($this->pwm()==false){
            header("location: ../index.php?error=emailExists");
            exit();
        }
        else{
            $result= false;
        }
        $this->setuser($this->uname,$this->email,$this->pw); 
        
    }
    private function emptysu( ){
        $result=false;
        if(empty($this->uname) || empty($this->email) || empty($this->pw) || empty($this->cpw) ){
            $result=false;
        }
        else{
            $result= true;
        }
        return $result;
        
    }
    private function invalidun(){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uname)){
            $result=false;
            
        }else{
            $result=true;
            
        }
        return $result;
    }
    private function invalidemail(){
        $result=null;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function pwmatch( ){
        $result=null;
        if($this->pw!==$this->cpw){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function pwm( ){
        $result=null;
        if($this->checkUser($this->email)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function pwlength(){
        $pw=trim($this->pw);
        if(strlen($pw) <8){ 
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function pwcheck(){
        $result=null;
        if(!preg_match("/[a-z]/i",$this->pw)){
            $result=false;
        }elseif(!preg_match("/[0-9]/",$this->pw)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
   public function fetchuid($uid){
    $user=$this->getUID($uid);
   }
}