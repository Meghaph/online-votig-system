<?php
    include("connect.php");

    $name = $_POST['name'];
    $email= $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $targetDir = "../uploads/";
    $image = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $image;
    $role= $_POST['role'];

    
    if($password==$cpassword){
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
        $insert = mysqli_query($connect, "INSERT INTO user (name, email, mobile, password,photo, role, status, votes) VALUES ('$name','$email','$mobile','$password','$image','$role',0,0)");
        if($insert){
            echo '
           <script>
               alert("registration successfull!");
               window.location = "../";
           </script>
        ';
        }
        else{
            echo '
           <script>
               alert("some error occered!!");
               window.location = "../routes/register.html";
           </script>
        ';
            
        }

    } else {
        echo '
        <script>
        alert("something went wrong in uploading file");
        </script>
        ';
    }        
}else{
        echo '
           <script>
               alert("password doesnot match!");
               window.location = "../routes/register.html";
           </script>
        ';
    }
?>