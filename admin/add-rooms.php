<?php 
$title = "Add New Room"; 
include 'include/head.php';
$errors = array();

if (isset($_POST['save'])) {
    $Roomname = $_POST['roomName'];
    $Roomnumber = $_POST['roomNumber'];
    $Totalcapacity = $_POST['totalCapacity'];

    if (empty($Roomnumber)){
        array_push($errors,"Room Number is Required");
    }
    if (empty($Totalcapacity)){
        array_push($errors,"Room Number is Required");
    }
    
    
    $sql = "INSERT INTO rooms (roomName, roomNumber, totalCapacity) VALUE('$Roomname', '$Roomnumber', '$Totalcapacity')";
    
    if (count($errors) == 0){
    mysqli_query($conn, $sql);
    $_SESSION['success'] = "Room Created Successfully !";
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

            <form action="add-rooms.php" method="post">
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Room Name</b></label>
                        <input class="form-control" name="roomName" placeholder="Room Name">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Room Number</b></label>
                        <input class="form-control" name="roomNumber" placeholder="Room Number">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="form-group">
                        <label><b>Total Capacity</b></label>
                        <select name="totalCapacity"  class="form-control">
                            <option>Select Room Capacity</option>
                            <option value="AC Single Bed Room">AC Single Bed Room</option>
                            <option value="AC Double Bed Room">AC Single Bed Room</option>
                            <option value="Deluxe Single Bed Room">Deluxe Single Bed Room</option>
                            <option value="Deluxe Double Bed Room">Deluxe Double Bed Room</option>
                            <option value="Premium Double Bed Room">Premium Double Bed Room</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-primary">
                        Submit
                    </button>
                    <a href="list-rooms.php" class="btn btn-danger">All Room</a>
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
