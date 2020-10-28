<?php

Interface Account {
public function register ($pdo);
public function login($pdo);
public function changePassword($pdo);
public function logout ($pdo);
}
 

    class User implements Account {
    
        private $fullName; 
        private $username;
        private $email; 
        private $phone;
        private $city; 
        private $password;
        
         
        function __construct(){
        
        }
        
        public function setFullName ($name){
        	$this->fullName = $name;
        }
        
        public function getFullName (){
        	return $this->fullName;
        }

         public function setUsername ($user){
            $this->username = $user;
        }
        
        public function getUsername (){
            return $this->username;
        }

         public function setEmail ($mail){
            $this->email = $mail;
        }
        
        public function getEmail (){
            return $this->email; 
        }

        public function setPhoneNo ($no){
            $this->phone = $no;
        }
        
        public function getPhoneNo (){
            return $this->phone; 
        }

         public function setCity ($cy){
            $this->city = $cy;
        }
        
        public function getCity (){
            return $this->city;
        }

         public function setPassword ($pass){
            $this->password = $pass;
        }
        
        public function getPassword (){
            return $this->password;
        }

        
        public function register ($pdo){
            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO user (Full_name,Username,Email,Phone,City,Password) VALUES(?,?,?,?,?,?)');
                $stmt->execute([$this->getFullName(),$this->getUsername(),$this->getEmail (),$this->getPhoneNo (),$this->getCity (),$passwordHash]);
                return "Registration was successfull";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }            
        }
        
        public function login ($pdo){
            try {
                $stmt = $pdo->prepare("SELECT Password FROM Registration WHERE Email=?");
                $stmt->execute([$this->email]);
                $row = $stmt->fetch();
                if($row == null){
                	return "This account does not exist";
                }
                if (password_verify($this->password,$row['Password'])){
                	return "Correct Password";
                }
                return "Your username or password is not correct";
            } catch (PDOException $e) {
            	return $e->getMessage();            }
        }

        }
    }
?>