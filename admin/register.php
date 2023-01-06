<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Register </title>

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

// initializing variable
$email ="";
$errors =array();

if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn,$_POST['fname']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confpassword = mysqli_real_escape_string($conn,$_POST['conf_password']);
    // Validation
    if (empty($name)){
        array_push($errors,"Full Name is Required");
    }
    if (empty($email)){
        array_push($errors,"Email is Required");
    }
    if (empty($password)){
        array_push($errors,"Password is Required");
    }
    if ($password != $confpassword){
        array_push($errors,"Confirm Password is nor match");
    }
// Check user
$userCheck ="SELECT * FROM users WHERE email= '$email' LIMIT 1";
$userResult = mysqli_query($conn,$userCheck);
$user =mysqli_fetch_assoc($userResult);

if ($user){
    if ($user['email']=== $email){
        array_push($errors,"Email is already exists ");
    }
}

//finally register user
if (count($errors) == 0){
    $pass = md5($password);

    //Create user
    $sql = "INSERT INTO users ( full_name,email,password,status,is_admin) VALUE( '$name','$email', '$pass',1,0)";
    $register = mysqli_query($conn, $sql);


    //Create user profile
    $userId = mysqli_insert_id($conn);
    $userProfile = "INSERT INTO user_profile (user_id) VALUE('$userId')";
    $profile = mysqli_query($conn, $userProfile);

    $_SESSION['email'] = $email;
    $_SESSION['userId'] = $userId;
    $_SESSION['message'] = "You are Logged in";
    header('location: dashboard.php');
}

   mysqli_close($conn);

    
}
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                    <div class="panel-heading">
                    <img src="/lodge/admin/assets/lodge.png" alt="" style="margin-top: 30px; margin-bottom: 2px;">
            <h2 class="page-header text-center"><b>Admin Register</b></h2>
                <?php if (count($errors)> 0 ){ 
                 foreach ($errors as $error) {  ?>
                   <div class="alert alert-danger">
                        <?php echo $error;  ?>
                    </div>
                <?php } } ?>



                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Please Sign Up</b></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="register.php">
                            <fieldset>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Full Name" name="fname" type="text" autofocus>
                                </div>                         
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="conf_password" type="password" autofocus>
                                </div>
                                
                                <button type="submit" name="save" class="btn btn-lg btn-primary btn-block">
                        Register
                    </button>
                                <p style="margin-top: 10px;"><b>Already have an account?</b>
                                    <a href="login.php"><b>Sign In</b></a>
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
