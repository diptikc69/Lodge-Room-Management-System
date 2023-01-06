<?php 
$title = "Edit Customer";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM ldg_customer WHERE id = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $Name = $row['name'];
    $Address = $row['address'];
    $Email = $row['email'];
}
if (isset($_POST['update'])) { 
    $catName = $_POST['name'];
    $catAddress = $_POST['address'];
    $catEmail = $_POST['email'];
$sql = "UPDATE ldg_customer SET name ='". $catName."', address = '".$catAddress. "', email ='". $catEmail."' WHERE id = '". $editId."'";
    if (mysqli_query($conn, $sql)) {
        $success = " Customer  Updates Created Successfully !";
    } else {
        echo mysqli_error($conn);
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
                    <h2 class="page-header">Add Customer</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-sm-12">
            <?php 
                if (!empty($success)) { ?>
                    <div class="alert alert-success">
                        <?php echo $success;  ?>
                    </div>
                <?php } ?>
            </div>

            <form action="edit-customer.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Customer Name</b></label>
                        <input value="<?php echo $Name; ?>" class="form-control" name="name" placeholder="Dipti K.C.">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Address</b></label>
                        <input  value="<?php echo $Address; ?>" class="form-control" name="address" placeholder="Sinamangal">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input  value="<?php echo $Email; ?>" class="form-control" name="email" placeholder="diptikc69@gmail.com">
                    </div>
                    </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-customer.php" class="btn btn-primary">All Customer</a>
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
