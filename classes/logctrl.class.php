<?php
class Logctrl extends Login{
    private $email;
    private $pw;
    
    public function __construct($email,$pw)
    {
        $this->email=$email;
        $this->pw=$pw;
    }
    public function login(){
        
        if($this->emptysu()==false){
            header("location: ../index.php?error=emptyfields");
            exit();
        }
        $this->getuser($this->email,$this->pw); 
        
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
}
