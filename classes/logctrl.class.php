<?php
class Logctrl extends Login{
    private $email;
    private $pw;
    
    public function __construct($email=null,$pw=null)
    {
        if($email !==null && $pw !==null){
            $this->email=$email;
            $this->pw=$pw;
        }else if($email !==null){
            $this->email=$email;
        }
        
    }
    
    public function login(){
        
        if($this->emptysu()==false){
            header("location: ../login.php?error=emptyfields");
            exit();
        }
        $this->getuser($this->email,$this->pw); 
        $this->generateCode();
        $this->sendMail($this->email);
    }
    public function fPassword(){
        
        if($this->emptyEmail()==false){
            header("location: ../login.php?error=emptyfields");
            exit();
        }
        $this->getEmail($this->email); 
        $this->generateCode();
        $this->sendMail($this->email);
    }
    private function emptysu( ){
        $result=false;
        if(empty($this->email) || empty($this->pw)){
            $result=false;
        }
        else{
            $result= true;
        }
        return $result;
        
    }
    private function emptyEmail( ){
        $result=false;
        if(empty($this->email)){
            $result=false;
        }
        else{
            $result= true;
        }
        return $result;
        
    }
}
