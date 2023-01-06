<?php 
$title = "Add Customer"; 
include 'include/head.php';
$errors = array();

if (isset($_POST['save'])) {
    $Name = $_POST['name'];
    $Address = $_POST['address'];
    $Email = $_POST['email'];

    if (empty($Name)){
        array_push($errors,"Name is Required");
    }
    if (empty($Email)){
        array_push($errors,"Email is Required");
    }
    if (empty($Address)){
        array_push($errors,"Address is Required");
    }
    
    $sql = "INSERT INTO ldg_customer (name, address, email) VALUE('$Name', '$Address', '$Email')";
    
    if (count($errors) == 0){
    mysqli_query($conn, $sql);
    $_SESSION['success'] = "Customer Created Successfully !";
    } 
    mysqli_close($conn);
    
}

?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <?php include 'include/navbar.php';?>
            <!-- /.navbar-top-links -->

            <?php include 'include/sidebar.php';?>

            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add customers</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-sm-12">
            
            <?php 
                if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success'])
                         ?>
                    </div>
                    
                <?php } ?>

                <?php 
                if (count($errors)> 0 ){ 
                 foreach ($errors as $error) {  
                ?>
                    <div class="alert alert-danger">
                        <?php echo $error;  
                        ?>
                    </div>
                <?php } } ?>
            </div>

            <form action="add-customer.php" method="post">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label><b>Customer Name</b></label>
                        <input class="form-control" name="name" placeholder="customer Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="form-group">
                        <label><b>Customer Address</b></label>
                        <input class="form-control" name="address" placeholder="customer Address">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label><b>Customer Phone</b></label>
                        <input class="form-control" name="phone" placeholder="customer Phone">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label><b>Customer Email</b></label>
                        <input class="form-control" name="email" placeholder="customer Email">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-primary">
                        Submit
                    </button>
                    <a href="list-customer.php" class="btn btn-danger">All Customer</a>
                </div>
            </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'include/footer.php';?>

</body>

</html>
