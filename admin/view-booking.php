<?php 
$title = "View Booking";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM booking WHERE id = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $StartDate = $row['bookStartDate'];
    $EndDate = $row['bookEndDate'];
    $Comments = $row['bookingComments'];
}
if (isset($_POST['update'])) { 
    $StartDate = $row['bookStartDate'];
    $EndDate = $row['bookEndDate'];
    $Comments = $row['bookingComments'];
    
    
$sql = "UPDATE booking SET bookStartDate ='". $StartDate."', bookEndDate = '".$EndDate. "',bookingComments ='". $Comments."' WHERE id = '". $editId."'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Booking Created Successfully !";
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
                    <h2 class="page-header"><b>View </b></h2>
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
                        <label><b>Book Start Date</b></label>
                        <input value="<?php echo $StartDate; ?>"
                         class="form-control" name="bookStartDate" placeholder="Booking Start Date">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Book End Date</b></label>
                        <input  value="<?php echo $EndDate; ?>" class="form-control" name="bookEndDate" placeholder="Booking End Date">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Booking Comment</b></label>
                        <input  value="<?php echo $Comments; ?>" class="form-control" name="bookingComments" placeholder="Booking Comments">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-booking.php" class="btn btn-primary">All Booking</a>
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
