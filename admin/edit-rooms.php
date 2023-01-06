<?php 
$title = "Edit Room";
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
    $catRoomname = $_POST['roomName'];
    $catRoomnumber = $_POST['roomNumber'];
    $catTotalcapacity = $_POST['totalCapacity'];
$sql = "UPDATE rooms SET roomName ='". $catRoomname."', roomNumber = '".$catRoomnumber. "', totalCapacity ='". $Totalcapacity."' WHERE id = '". $editId."'";
    if (mysqli_query($conn, $sql)) {
        $success = " Room  Updates Created Successfully !";
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
                    <h2 class="page-header">Add Room</h2>
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

            <form action="edit-rooms.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Room Name</b></label>
                        <input value="<?php echo $Roomname; ?>" class="form-control" name="roomName" placeholder="Room Name">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Room Number</b></label>
                        <input  value="<?php echo $Roomnumber; ?>" class="form-control" name="roomNumber" placeholder="Room Number">
                    </div>
                </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Total Capacity</b></label>
                        <select name="roomId"  class="form-control">
                            <option><b>Select Room Capacity</b></option>
                            <option value="single-bed-with-washroom">Single Bed With Washroom</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
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
