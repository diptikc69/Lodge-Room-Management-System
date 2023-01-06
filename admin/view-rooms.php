<?php 
$title = "View Room";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM rooms WHERE roomId = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $Roomname = $row['roomName'];
    $Roomnumber = $row['roomNumber'];
    $Totalcapacity = $row['totalCapacity'];

}
if (isset($_POST['update'])) { 
    $Roomname = $_POST['roomName'];
    $Roomnumber = $_POST['roomNumber'];
    $Totalcapacity = $_POST['totalCapacity'];

    
$sql = "UPDATE rooms SET roomName ='". $Roomname."', roomNumber = '".$Roomnumber. "', totalCapacity ='". $Totalcapacity."' WHERE roomId = '". $editId."'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Room  Updates Created Successfully !";
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

            <form action="view-rooms.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Room Name</b></label>
                        <input value="<?php echo $Roomname; ?>"
                         class="form-control" name="roomName" placeholder="Room Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Room Number</b></label>
                        <input  value="<?php echo $Roomnumber; ?>" class="form-control" name="roomNumber" placeholder="Room Number">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label><b>Total Capacity</b></label>
                        <input  value="<?php echo $Totalcapacity; ?>" class="form-control" name="totalCapacity" placeholder="Total Capacity">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-rooms.php" class="btn btn-primary">All Room</a>
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
