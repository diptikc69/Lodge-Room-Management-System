<?php 
$title = "Add Booking";
include 'include/head.php';
$errors = array();

// Get the rooms from database
$catSql = "SELECT * FROM rooms";
$catResults = mysqli_query($conn, $catSql);

$customerSql = "SELECT * FROM ldg_customer";
$customerResults = mysqli_query($conn, $customerSql);

if (isset($_POST['save'])) {
    $StartDate = $_POST['bookStartDate'];
    $EndDate = $_POST['bookEndDate'];
    $Bookingcomment = $_POST['bookingComments'];
    $roomId = $_POST['roomId'];
    $customerId = $_POST['customerId'];

    if (empty($StartDate)){
        array_push($errors,"Booking Start Date is Required");
    }
    if (empty($EndDate)){
        array_push($errors,"Booking End Date is Required");
    }
    if (empty($roomId)){
        array_push($errors,"Room  is Required");
    }
    if (empty($customerId)){
        array_push($errors,"Customer is Required");
    }
    


    $sql = "INSERT INTO booking (custId, roomId, bookStartDate, bookEndDate, bookingComments) VALUE('$customerId', '$roomId','$StartDate', '$EndDate', '$Bookingcomment')";

    if (count($errors) == 0){
        mysqli_query($conn, $sql);
        $_SESSION['success'] = "Booking Created Successfully !";
        } 
        mysqli_close($conn);
}

?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <?php include 'include/navbar.php';?>
            <?php include 'include/sidebar.php';?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Booking</h2>
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
            <form action="add-booking.php" method="post" enctype="multipart/form-data">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Booking Start Date</b></label>
                        <input type="date" class="form-control" name="bookStartDate" placeholder="2022/12/1">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Booking End Date</b></label>
                        <input type="date" class="form-control" name="bookEndDate" placeholder="2022/12/1">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Booking Comment</b></label>
                        <textarea name="bookingComments" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Room</b></label>
                        <select name="roomId"  class="form-control">
                            <option value="">Select Room</option>
                            <?php 
                    if (mysqli_num_rows($catResults) > 0) { 
                        while($row = mysqli_fetch_array($catResults)){
                        ?>
                        <option value="<?php echo $row['roomId']; ?>"><?php echo $row['roomName']; ?></option>
                        <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Customer</b></label>
                        <select name="customerId"  class="form-control">
                            <option value="">Select Customer</option>
                            <?php 
                    if (mysqli_num_rows($customerResults) > 0) { 
                        while($row = mysqli_fetch_array($customerResults)){
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-success">
                        Save
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
