<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login </title>

    <!-- Bootstrap Core CSS -->
    <link href="/lodge/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/lodge/admin/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/lodge/admin/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<?php 

session_start();
include_once 'include/connection.php';

if(isset($_SESSION['email'])){
    header('location: dashboard.php');
}

$errors =array();

if (isset($_POST['login'])) {
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

   if (empty($email)){
    array_push($errors,"Email is Required");
    }
    if (empty($password)){
    array_push($errors,"Password is Required");
    }
    if (count($errors) == 0){
        $pass= md5($password); 
        $query ="SELECT * FROM users WHERE email= '$email' AND password= '$pass' AND status=1";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['email'] = $email;
            $_SESSION['userId'] = $row['id'];
            $_SESSION['message'];"You are Logged in";
            header('location: dashboard.php');
        }else{
            array_push($errors, "Wrong Email and Password");
        }
    }
}
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                    <div class="panel-heading">
                    <img src="/lodge/admin/assets/lodge.png" alt="" style="margin-top: 30px; margin-bottom: 20px;">
            <?php if (count($errors)> 0 ){ 
                foreach ($errors as $error) {  ?>
                <div class="alert alert-danger">
                        <?php echo $error;  ?>
                </div>
                    <?php } } ?>        
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Please Sign In</b></h3>
                    </div>
                    <div class="panel-body">
                    <form action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username or Email" name="email" type="email">
    
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login" class="width-35 pull-right btn btn-sm btn-primary">
                        <b>Login</b>
                    </button>
                               <p style="margin-top:10px;"><b>Already have an account?</b>
                                    <a href="register.php"><b>Sign Up</b></a>
                               </p>
                                 
                            </fieldset>
                        </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'include/footer.php';?>
</body>

</html>
