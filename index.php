<?php
    Require_once 'user.php';
    Require_once 'db.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    
    if(isset($_POST["Register"]){
        
        $fullName = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['user_email'];
        $phoneNo = $_POST['phone'];
        $image = $_FILES['ProfileImage'];
        $city = $_POST['city'];
        $password = $_POST['password'];
        $Original_file_name=$_FILES["ProfileImage"]["name"];

        $file_type= substr($Original_file_name, strpos($Original_file_name, '.'), strlen($Original_file_name));
        $file_path = "assets/";
        $new_file_name=time().$file_type;

         if(move_uploaded_file( $file_path.$new_file_name)){
        $pdo ="INSERT INTO Registration(ProfileImageAddress) VALUES('$new_file_name')";
         }

        $user = new User();
        $user->setFullName($Full_name);
        $user->setUsername($Username);
        $user->setEmail($Email);
        $user->setPhoneNo($Phone);
        $user->setCity($City);
        $user->setPassword($Password);
        
        echo $user->register($pdo);
         
    }else if(isset($_POST["Login"])) {
        //login
        $email = $_POST['user_email'];
        $password = $_POST['password'];
        $user = new User($Email, $Password);
        echo $user->login($pdo);
    } 
?> 