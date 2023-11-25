<?php
session_start();
mysqli_connect("localhost","root","","register_user");
?>
<?php
if(isset($_POST['register'])){
$user_name=mysqli_real_escape_string($con,$_POST['username']);
$user_email=mysqli_real_escape_string($con,$_POST['email']);
$user_password=mysqli_real_escape_string($con,$_POST['password']);
$user_confirm_password=mysqli_real_escape_string($con,$_POST['confirm password']);
if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
echo"<script>alert('invalid email')</script>";
exit();
}
if(strlen($user_password)<6){
echo"<script>alert('password must atleat be 6 letters')</script>"
exit();
}
$sel_email="select*from register_user where user_email
=$email";
$run_email=mysqli_query($con,$sel_email);
$check_email=mysqli_num_rows($run_email);
if($check_email==1){
    echo"<script>alert('This email is registered')</script>";
}
exit();
}
else{
    $_SESSION['user_email']=$user_email;
    $insert="insert into register_user(user_name,user_email
    ,user_password,confirm_password)values(username,email,password
    confirm password)";
    $run_insert=mysqli_query($con,$insert);
    if($run_insert){
        echo"<script>window.open('login.php'),'_self')</script>";
    }
}




?>