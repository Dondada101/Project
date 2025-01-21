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
    public function updatePassword($newPassword) { 
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); 
        $conn = new Conn(); 
        $db = $conn->connect();
         $sql = "UPDATE users SET upassword = :password WHERE email = :email"; 
         $stmt = $db->prepare($sql); 
         if ($stmt === false) {
             echo "Error preparing statement: " . $db->errorInfo(); 
             return; 
            } 
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $this->email); 
             if($stmt->execute()) {
                // echo "Password Changed"; 
                } else { 
                    echo "Error updating password: " . implode(", ", $stmt->errorInfo()); 
                } 
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
