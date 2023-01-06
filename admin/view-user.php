<?php 
$title = "View Booking";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM users WHERE id = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $Fullname = $row['full_name'];
    $Email = $row['email'];
    $Phone = $row['phone'];

}
if (isset($_POST['update'])) { 
    $Fullname = $_POST['full_name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];

    
$sql = "UPDATE users SET full_name ='". $Fullname."', email = '".$Email. "', phone = '".$Phone."' WHERE id = '". $editId."'";
    
    if (mysqli_query($conn, $sql)) {
        $success = " Updated Successfully !";
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
                    <h2 class="page-header"><b>View</b> </h2>
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

            <form action="view-user.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Full Name</b></label>
                        <input value="<?php echo $Fullname; ?>"
                         class="form-control" name="full_name" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input  value="<?php echo $Email; ?>" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Phone</b></label>
                        <input  value="<?php echo $Phone; ?>" class="form-control" name="phone" placeholder="phone">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-user.php" class="btn btn-primary">All User</a>
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
